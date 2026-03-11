<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\Dto\Auctions\Request\PlaceBidsRequest;
use CommunitySDKs\GoDaddy\Dto\Auctions\Response\ErrorResponse;
use CommunitySDKs\GoDaddy\Dto\Auctions\Response\PlaceBidsResponse;
use CommunitySDKs\GoDaddy\Exception\ApiException;
use CommunitySDKs\GoDaddy\Exception\Auctions\AuctionsApiException;
use CommunitySDKs\GoDaddy\Exception\Auctions\AuctionsBadRequestException;
use CommunitySDKs\GoDaddy\Exception\Auctions\AuctionsForbiddenException;
use CommunitySDKs\GoDaddy\Exception\Auctions\AuctionsRateLimitException;
use CommunitySDKs\GoDaddy\Exception\Auctions\AuctionsServerException;
use CommunitySDKs\GoDaddy\Exception\Auctions\AuctionsUnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\Auctions\AuctionsUnprocessableEntityException;

final class AuctionsService extends AbstractService
{

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, 'auctions');
    }

    public function placeBids(PlaceBidsRequest $request): PlaceBidsResponse
    {
        try {
            $response = $this->call(
                'POST',
                '/v1/customers/{customerId}/aftermarket/listings/bids',
                pathParams: $request->toPathParams(),
                body: $request->toBody()
            );

            return PlaceBidsResponse::fromArray($this->expectListArray($response));
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    private function expectListArray(mixed $response): array
    {
        if (is_array($response) && array_is_list($response)) {
            return $response;
        }

        throw new \UnexpectedValueException('Expected JSON array response list from GoDaddy auctions API.');
    }

    private function mapException(ApiException $exception): AuctionsApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(AuctionsBadRequestException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            401 => $this->rebuildException(AuctionsUnauthorizedException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            403 => $this->rebuildException(AuctionsForbiddenException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            422 => $this->rebuildException(AuctionsUnprocessableEntityException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            429 => $this->rebuildException(AuctionsRateLimitException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            default => $this->rebuildException(AuctionsServerException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
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
     * @param class-string<AuctionsApiException> $class
     */
    private function rebuildException(string $class, ApiException $exception, object $errorResponse): AuctionsApiException
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

