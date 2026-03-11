<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\Dto\Agreements\Request\GetAgreementsRequest;
use CommunitySDKs\GoDaddy\Dto\Agreements\Response\AgreementsListResponse;
use CommunitySDKs\GoDaddy\Dto\Agreements\Response\ErrorLimitResponse;
use CommunitySDKs\GoDaddy\Dto\Agreements\Response\ErrorResponse;
use CommunitySDKs\GoDaddy\Exception\Agreements\AgreementsApiException;
use CommunitySDKs\GoDaddy\Exception\Agreements\AgreementsBadRequestException;
use CommunitySDKs\GoDaddy\Exception\Agreements\AgreementsForbiddenException;
use CommunitySDKs\GoDaddy\Exception\Agreements\AgreementsRateLimitException;
use CommunitySDKs\GoDaddy\Exception\Agreements\AgreementsServerException;
use CommunitySDKs\GoDaddy\Exception\Agreements\AgreementsUnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\ApiException;

final class AgreementsService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function get(GetAgreementsRequest $request): AgreementsListResponse
    {
        try {
            $response = $this->call(
                'GET',
                '/v1/agreements',
                queryParams: $request->toQueryParams(),
                headers: $request->toHeaders()
            );

            return AgreementsListResponse::fromArray($this->expectListArray($response));
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    private function expectListArray(mixed $response): array
    {
        if (is_array($response) && array_is_list($response)) {
            return $response;
        }

        throw new \UnexpectedValueException('Expected JSON array response list from GoDaddy agreements API.');
    }

    private function mapException(ApiException $exception): AgreementsApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(AgreementsBadRequestException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            401 => $this->rebuildException(AgreementsUnauthorizedException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            403 => $this->rebuildException(AgreementsForbiddenException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            429 => $this->rebuildException(AgreementsRateLimitException::class, $exception, ErrorLimitResponse::fromArray($this->decodeErrorBody($exception))),
            default => $this->rebuildException(AgreementsServerException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
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
     * @param class-string<AgreementsApiException> $class
     */
    private function rebuildException(string $class, ApiException $exception, object $errorResponse): AgreementsApiException
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
