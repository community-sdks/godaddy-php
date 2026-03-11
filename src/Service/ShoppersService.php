<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\ChangePasswordRequest;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\CreateSubaccountRequest;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\DeleteShopperRequest;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\GetShopperRequest;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\GetShopperStatusRequest;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\UpdateShopperRequest;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Response\DeleteShopperResponse;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Response\ErrorLimitResponse;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Response\ErrorResponse;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Response\PasswordErrorResponse;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Response\ShopperIdResponse;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Response\ShopperResponse;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Response\ShopperStatusResponse;
use CommunitySDKs\GoDaddy\Exception\ApiException;
use CommunitySDKs\GoDaddy\Exception\Shoppers\ShoppersBadRequestException;
use CommunitySDKs\GoDaddy\Exception\Shoppers\ShoppersConflictException;
use CommunitySDKs\GoDaddy\Exception\Shoppers\ShoppersForbiddenException;
use CommunitySDKs\GoDaddy\Exception\Shoppers\ShoppersNotFoundException;
use CommunitySDKs\GoDaddy\Exception\Shoppers\ShoppersPasswordPolicyException;
use CommunitySDKs\GoDaddy\Exception\Shoppers\ShoppersRateLimitException;
use CommunitySDKs\GoDaddy\Exception\Shoppers\ShoppersServerException;
use CommunitySDKs\GoDaddy\Exception\Shoppers\ShoppersUnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\Shoppers\ShoppersUnprocessableEntityException;

final class ShoppersService extends AbstractService
{

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, 'shoppers');
    }

    public function createSubaccount(CreateSubaccountRequest $request): ShopperIdResponse
    {
        try {
            $response = $this->call('POST', '/v1/shoppers/subaccount', body: $request->toArray());
            return ShopperIdResponse::fromArray($this->expectArray($response));
        } catch (ApiException $exception) {
            throw $this->mapStandardException($exception);
        }
    }

    public function get(GetShopperRequest $request): ShopperResponse
    {
        try {
            $response = $this->call(
                'GET',
                '/v1/shoppers/{shopperId}',
                pathParams: $request->toPathParams(),
                queryParams: $request->toQueryParams()
            );
            return ShopperResponse::fromArray($this->expectArray($response));
        } catch (ApiException $exception) {
            throw $this->mapStandardException($exception);
        }
    }

    public function update(UpdateShopperRequest $request): ShopperIdResponse
    {
        try {
            $response = $this->call(
                'POST',
                '/v1/shoppers/{shopperId}',
                pathParams: $request->toPathParams(),
                body: $request->toBody()
            );
            return ShopperIdResponse::fromArray($this->expectArray($response));
        } catch (ApiException $exception) {
            throw $this->mapStandardException($exception);
        }
    }

    public function delete(DeleteShopperRequest $request): DeleteShopperResponse
    {
        try {
            $this->call(
                'DELETE',
                '/v1/shoppers/{shopperId}',
                pathParams: $request->toPathParams(),
                queryParams: $request->toQueryParams()
            );

            return new DeleteShopperResponse();
        } catch (ApiException $exception) {
            throw $this->mapDeleteException($exception);
        }
    }

    public function getStatus(GetShopperStatusRequest $request): ShopperStatusResponse
    {
        try {
            $response = $this->call(
                'GET',
                '/v1/shoppers/{shopperId}/status',
                pathParams: $request->toPathParams(),
                queryParams: $request->toQueryParams()
            );
            return ShopperStatusResponse::fromArray($this->expectArray($response));
        } catch (ApiException $exception) {
            throw $this->mapStandardException($exception);
        }
    }

    public function changePassword(ChangePasswordRequest $request): ShopperIdResponse
    {
        try {
            $response = $this->call(
                'PUT',
                '/v1/shoppers/{shopperId}/factors/password',
                pathParams: $request->toPathParams(),
                body: $request->toBody()
            );
            return ShopperIdResponse::fromArray($this->expectArray($response));
        } catch (ApiException $exception) {
            throw $this->mapPasswordException($exception);
        }
    }

    private function expectArray(mixed $response): array
    {
        if (is_array($response)) {
            return $response;
        }

        throw new \UnexpectedValueException('Expected JSON object response array from GoDaddy shoppers API.');
    }

    private function mapStandardException(ApiException $exception): ApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(ShoppersBadRequestException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            401 => $this->rebuildException(ShoppersUnauthorizedException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            403 => $this->rebuildException(ShoppersForbiddenException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            404 => $this->rebuildException(ShoppersNotFoundException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            422 => $this->rebuildException(ShoppersUnprocessableEntityException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            429 => $this->rebuildException(ShoppersRateLimitException::class, $exception, ErrorLimitResponse::fromArray($this->decodeErrorBody($exception))),
            default => $this->rebuildException(ShoppersServerException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
        };
    }

    private function mapDeleteException(ApiException $exception): ApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(ShoppersBadRequestException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            401 => $this->rebuildException(ShoppersUnauthorizedException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            403 => $this->rebuildException(ShoppersForbiddenException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            404 => $this->rebuildException(ShoppersNotFoundException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            409 => $this->rebuildException(ShoppersConflictException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            422 => $this->rebuildException(ShoppersUnprocessableEntityException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            429 => $this->rebuildException(ShoppersRateLimitException::class, $exception, ErrorLimitResponse::fromArray($this->decodeErrorBody($exception))),
            default => $this->rebuildException(ShoppersServerException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
        };
    }

    private function mapPasswordException(ApiException $exception): ApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(ShoppersPasswordPolicyException::class, $exception, PasswordErrorResponse::fromArray($this->decodeErrorBody($exception))),
            401 => $this->rebuildException(ShoppersUnauthorizedException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            default => $this->rebuildException(ShoppersServerException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
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
     * @param class-string<\CommunitySDKs\GoDaddy\Exception\Shoppers\ShoppersApiException> $class
     */
    private function rebuildException(string $class, ApiException $exception, object $errorResponse): ApiException
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

