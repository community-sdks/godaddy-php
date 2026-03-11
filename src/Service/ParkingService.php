<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\Dto\Parking\Request\GetParkingMetricsByDomainRequest;
use CommunitySDKs\GoDaddy\Dto\Parking\Request\GetParkingMetricsRequest;
use CommunitySDKs\GoDaddy\Dto\Parking\Response\ErrorLimitResponse;
use CommunitySDKs\GoDaddy\Dto\Parking\Response\ErrorResponse;
use CommunitySDKs\GoDaddy\Dto\Parking\Response\MetricByDomainListResponse;
use CommunitySDKs\GoDaddy\Dto\Parking\Response\MetricListResponse;
use CommunitySDKs\GoDaddy\Exception\ApiException;
use CommunitySDKs\GoDaddy\Exception\Parking\ParkingApiException;
use CommunitySDKs\GoDaddy\Exception\Parking\ParkingBadRequestException;
use CommunitySDKs\GoDaddy\Exception\Parking\ParkingForbiddenException;
use CommunitySDKs\GoDaddy\Exception\Parking\ParkingRateLimitException;
use CommunitySDKs\GoDaddy\Exception\Parking\ParkingServerException;
use CommunitySDKs\GoDaddy\Exception\Parking\ParkingUnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\Parking\ParkingUnprocessableEntityException;

final class ParkingService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function getMetrics(GetParkingMetricsRequest $request): MetricListResponse
    {
        try {
            $response = $this->call(
                'GET',
                '/v1/customers/{customerId}/parking/metrics',
                pathParams: $request->toPathParams(),
                queryParams: $request->toQueryParams(),
                headers: $request->toHeaders()
            );

            return MetricListResponse::fromArray($this->expectAssocArray($response));
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    public function getMetricsByDomain(GetParkingMetricsByDomainRequest $request): MetricByDomainListResponse
    {
        try {
            $response = $this->call(
                'GET',
                '/v1/customers/{customerId}/parking/metricsByDomain',
                pathParams: $request->toPathParams(),
                queryParams: $request->toQueryParams(),
                headers: $request->toHeaders()
            );

            return MetricByDomainListResponse::fromArray($this->expectAssocArray($response));
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    private function expectAssocArray(mixed $response): array
    {
        if (is_array($response) && (array_is_list($response) === false || $response === [])) {
            return $response;
        }

        throw new \UnexpectedValueException('Expected JSON object response array from GoDaddy parking API.');
    }

    private function mapException(ApiException $exception): ParkingApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(ParkingBadRequestException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            401 => $this->rebuildException(ParkingUnauthorizedException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            403 => $this->rebuildException(ParkingForbiddenException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            422 => $this->rebuildException(ParkingUnprocessableEntityException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            429 => $this->rebuildException(ParkingRateLimitException::class, $exception, ErrorLimitResponse::fromArray($this->decodeErrorBody($exception))),
            default => $this->rebuildException(ParkingServerException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
        };
    }

    private function decodeErrorBody(ApiException $exception): array
    {
        $body = $exception->getResponseBody();
        if ($body === '') {
            return [];
        }

        try {
            $decoded = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
            return is_array($decoded) ? $decoded : [];
        } catch (\JsonException) {
            return [];
        }
    }

    /**
     * @param class-string<ParkingApiException> $class
     */
    private function rebuildException(string $class, ApiException $exception, object $errorResponse): ParkingApiException
    {
        return new $class(
            message: $exception->getMessage(),
            statusCode: $exception->getStatusCode(),
            responseBody: $exception->getResponseBody(),
            headers: $exception->getHeaders(),
            requestMethod: $exception->getRequestMethod(),
            requestUrl: $exception->getRequestUrl(),
            errorResponse: $errorResponse
        );
    }
}
