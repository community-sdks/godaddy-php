<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Exception;

class ApiException extends \RuntimeException
{
    public function __construct(
        string $message,
        private readonly int $statusCode,
        private readonly string $responseBody,
        private readonly array $headers,
        private readonly string $requestMethod,
        private readonly string $requestUrl
    ) {
        parent::__construct($message, $statusCode);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getResponseBody(): string
    {
        return $this->responseBody;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getRequestMethod(): string
    {
        return $this->requestMethod;
    }

    public function getRequestUrl(): string
    {
        return $this->requestUrl;
    }

    public function getRequestId(): ?string
    {
        return $this->headers['X-Request-Id'] ?? $this->headers['x-request-id'] ?? null;
    }
}
