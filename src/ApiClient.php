<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy;

use JsonException;
use CommunitySDKs\GoDaddy\Auth\ApiKeyAuth;
use CommunitySDKs\GoDaddy\Exception\ApiException;
use CommunitySDKs\GoDaddy\Exception\NotFoundException;
use CommunitySDKs\GoDaddy\Exception\RateLimitException;
use CommunitySDKs\GoDaddy\Exception\ServerException;
use CommunitySDKs\GoDaddy\Exception\UnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\ValidationException;
use CommunitySDKs\GoDaddy\Http\Request;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Http\TransportInterface;

final class ApiClient
{
    public function __construct(
        private readonly Config $config,
        private readonly TransportInterface $transport
    ) {
    }

    public static function buildQueryString(array $query): string
    {
        $parts = [];
        foreach ($query as $key => $value) {
            if ($value === null) {
                continue;
            }

            if (is_array($value)) {
                foreach ($value as $item) {
                    if ($item !== null) {
                        $parts[] = rawurlencode((string) $key) . '=' . rawurlencode(self::stringify($item));
                    }
                }
                continue;
            }

            $parts[] = rawurlencode((string) $key) . '=' . rawurlencode(self::stringify($value));
        }

        return implode('&', $parts);
    }

    public function request(
        string $method,
        string $serviceBaseUrl,
        string $path,
        array $pathParams = [],
        array $queryParams = [],
        array $headers = [],
        mixed $body = null,
        bool $multipart = false
    ): mixed {
        $request = new Request(
            method: $method,
            url: rtrim($this->config->baseUrl ?? $serviceBaseUrl, '/') . $this->interpolatePath($path, $pathParams),
            headers: $this->buildHeaders($headers, $body, $multipart),
            query: array_filter($queryParams, static fn (mixed $value): bool => $value !== null),
            body: $body,
            multipart: $multipart,
            timeout: $this->config->timeout
        );

        $response = $this->sendWithRetry($request);

        if ($response->statusCode < 200 || $response->statusCode >= 300) {
            throw $this->mapException($request, $response);
        }

        return $this->decodeResponse($response);
    }

    private function buildHeaders(array $headers, mixed $body, bool $multipart): array
    {
        $resolved = [
            'Accept' => 'application/json',
            'User-Agent' => $this->config->userAgent,
            ...$this->config->defaultHeaders,
            ...array_filter($headers, static fn (mixed $value): bool => $value !== null),
        ];

        foreach (ApiKeyAuth::headers($this->config) as $name => $value) {
            $resolved[$name] = $value;
        }

        if ($body !== null && !isset($resolved['Content-Type'])) {
            $resolved['Content-Type'] = $multipart ? 'multipart/form-data' : 'application/json';
        }

        return $resolved;
    }

    private function sendWithRetry(Request $request): Response
    {
        $attempt = 0;
        while (true) {
            $response = $this->transport->send($request);
            if (!$this->shouldRetry($response, $attempt)) {
                return $response;
            }

            $this->sleepBeforeRetry($response, $attempt);
            $attempt++;
        }
    }

    private function shouldRetry(Response $response, int $attempt): bool
    {
        if ($attempt >= $this->config->maxRetries) {
            return false;
        }

        return in_array($response->statusCode, [408, 429, 500, 502, 503, 504], true);
    }

    private function sleepBeforeRetry(Response $response, int $attempt): void
    {
        $retryAfter = $response->headers['Retry-After'] ?? $response->headers['retry-after'] ?? null;
        if ($retryAfter !== null && is_numeric($retryAfter)) {
            usleep((int) $retryAfter * 1000000);
            return;
        }

        $base = $this->config->retryDelayMs * (2 ** $attempt);
        $jitter = random_int(0, max(1, (int) floor($base / 4)));
        usleep(($base + $jitter) * 1000);
    }

    private function interpolatePath(string $path, array $pathParams): string
    {
        foreach ($pathParams as $name => $value) {
            $path = str_replace('{' . $name . '}', rawurlencode(self::stringify($value)), $path);
        }

        return $path;
    }

    private static function stringify(mixed $value): string
    {
        if ($value instanceof \BackedEnum) {
            $value = $value->value;
        }

        if ($value instanceof \DateTimeInterface) {
            return $value->format(\DateTimeInterface::ATOM);
        }

        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if (is_array($value)) {
            return json_encode($value, JSON_THROW_ON_ERROR);
        }

        return (string) $value;
    }

    private function decodeResponse(Response $response): mixed
    {
        if ($response->body === '') {
            return null;
        }

        $contentType = strtolower((string) ($response->headers['Content-Type'] ?? $response->headers['content-type'] ?? ''));
        if (str_contains($contentType, 'json') || str_starts_with(ltrim($response->body), '{') || str_starts_with(ltrim($response->body), '[')) {
            try {
                return json_decode($response->body, true, 512, JSON_THROW_ON_ERROR);
            } catch (JsonException) {
                return $response->body;
            }
        }

        return $response->body;
    }

    private function mapException(Request $request, Response $response): ApiException
    {
        $class = match ($response->statusCode) {
            400 => ValidationException::class,
            401, 403 => UnauthorizedException::class,
            404 => NotFoundException::class,
            429 => RateLimitException::class,
            default => $response->statusCode >= 500 ? ServerException::class : ApiException::class,
        };

        return new $class(
            message: 'GoDaddy API request failed with status ' . $response->statusCode,
            statusCode: $response->statusCode,
            responseBody: $response->body,
            headers: $response->headers,
            requestMethod: $request->method,
            requestUrl: $request->fullUrl()
        );
    }
}
