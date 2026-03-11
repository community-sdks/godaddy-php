<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\Dto\Countries\Request\GetCountriesRequest;
use CommunitySDKs\GoDaddy\Dto\Countries\Request\GetCountryRequest;
use CommunitySDKs\GoDaddy\Dto\Countries\Response\CountriesListResponse;
use CommunitySDKs\GoDaddy\Dto\Countries\Response\CountryListResponse;
use CommunitySDKs\GoDaddy\Dto\Countries\Response\ErrorLimitResponse;
use CommunitySDKs\GoDaddy\Dto\Countries\Response\ErrorResponse;
use CommunitySDKs\GoDaddy\Exception\ApiException;
use CommunitySDKs\GoDaddy\Exception\Countries\CountriesApiException;
use CommunitySDKs\GoDaddy\Exception\Countries\CountriesBadRequestException;
use CommunitySDKs\GoDaddy\Exception\Countries\CountriesForbiddenException;
use CommunitySDKs\GoDaddy\Exception\Countries\CountriesNotFoundException;
use CommunitySDKs\GoDaddy\Exception\Countries\CountriesRateLimitException;
use CommunitySDKs\GoDaddy\Exception\Countries\CountriesServerException;
use CommunitySDKs\GoDaddy\Exception\Countries\CountriesUnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\Countries\CountriesUnprocessableEntityException;

final class CountriesService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL, 'countries');
    }

    public function getCountries(GetCountriesRequest $request): CountriesListResponse
    {
        try {
            $response = $this->call('GET', '/v1/countries', queryParams: $request->toQueryParams());
            return CountriesListResponse::fromArray($this->expectListArray($response));
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    public function getCountry(GetCountryRequest $request): CountryListResponse
    {
        try {
            $response = $this->call(
                'GET',
                '/v1/countries/{countryKey}',
                pathParams: $request->toPathParams(),
                queryParams: $request->toQueryParams()
            );
            return CountryListResponse::fromArray($this->expectListArray($response));
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    private function expectListArray(mixed $response): array
    {
        if (is_array($response)) {
            return $response;
        }

        throw new \UnexpectedValueException('Expected JSON array response list from GoDaddy countries API.');
    }

    private function mapException(ApiException $exception): CountriesApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(CountriesBadRequestException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            401 => $this->rebuildException(CountriesUnauthorizedException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            403 => $this->rebuildException(CountriesForbiddenException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            404 => $this->rebuildException(CountriesNotFoundException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            422 => $this->rebuildException(CountriesUnprocessableEntityException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            429 => $this->rebuildException(CountriesRateLimitException::class, $exception, ErrorLimitResponse::fromArray($this->decodeErrorBody($exception))),
            default => $this->rebuildException(CountriesServerException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
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
     * @param class-string<CountriesApiException> $class
     */
    private function rebuildException(string $class, ApiException $exception, object $errorResponse): CountriesApiException
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
