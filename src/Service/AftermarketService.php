<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\Dto\Aftermarket\Request\AddExpiryListingsRequest;
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Request\DeleteListingsRequest;
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Request\GetListingsRequest;
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Response\AftermarketResponse;
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Response\ErrorLimitResponse;
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Response\ErrorResponse;
use CommunitySDKs\GoDaddy\Exception\Aftermarket\AftermarketApiException;
use CommunitySDKs\GoDaddy\Exception\Aftermarket\AftermarketBadRequestException;
use CommunitySDKs\GoDaddy\Exception\Aftermarket\AftermarketForbiddenException;
use CommunitySDKs\GoDaddy\Exception\Aftermarket\AftermarketRateLimitException;
use CommunitySDKs\GoDaddy\Exception\Aftermarket\AftermarketServerException;
use CommunitySDKs\GoDaddy\Exception\Aftermarket\AftermarketUnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\Aftermarket\AftermarketUnprocessableEntityException;
use CommunitySDKs\GoDaddy\Exception\ApiException;

final class AftermarketService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function getListings(GetListingsRequest $request): AftermarketResponse
    {
        return $this->execute(
            'GET',
            '/v1/customers/{customerId}/auctions/listings',
            pathParams: $request->toPathParams(),
            queryParams: $request->toQueryParams()
        );
    }

    public function deleteListings(DeleteListingsRequest $request): AftermarketResponse
    {
        return $this->execute('DELETE', '/v1/aftermarket/listings', queryParams: $request->toQueryParams());
    }

    public function addExpiryListings(AddExpiryListingsRequest $request): AftermarketResponse
    {
        return $this->execute('POST', '/v1/aftermarket/listings/expiry', body: $request->toBody());
    }

    private function execute(
        string $method,
        string $path,
        array $pathParams = [],
        array $queryParams = [],
        array $headers = [],
        mixed $body = null
    ): AftermarketResponse {
        try {
            $response = $this->call(
                $method,
                $path,
                pathParams: $pathParams,
                queryParams: $queryParams,
                headers: $headers,
                body: $body
            );

            return AftermarketResponse::fromMixed($response);
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    private function mapException(ApiException $exception): AftermarketApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(AftermarketBadRequestException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            401 => $this->rebuildException(AftermarketUnauthorizedException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            403 => $this->rebuildException(AftermarketForbiddenException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            422 => $this->rebuildException(AftermarketUnprocessableEntityException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            429 => $this->rebuildException(AftermarketRateLimitException::class, $exception, ErrorLimitResponse::fromArray($this->decodeErrorBody($exception))),
            default => $this->rebuildException(AftermarketServerException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
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
     * @param class-string<AftermarketApiException> $class
     */
    private function rebuildException(string $class, ApiException $exception, object $errorResponse): AftermarketApiException
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
