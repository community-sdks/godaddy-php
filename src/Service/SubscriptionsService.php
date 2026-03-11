<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\ListSubscriptionsRequest;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\SubscriptionProductGroupsRequest;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\SubscriptionRequest;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\UpdateSubscriptionRequest;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Response\CancelSubscriptionResponse;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Response\ErrorLimitResponse;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Response\ErrorResponse;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Response\ProductGroupListResponse;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Response\SubscriptionListResponse;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Response\SubscriptionResponse;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Response\UpdateSubscriptionResponse;
use CommunitySDKs\GoDaddy\Exception\ApiException;
use CommunitySDKs\GoDaddy\Exception\Subscriptions\SubscriptionsApiException;
use CommunitySDKs\GoDaddy\Exception\Subscriptions\SubscriptionsBadRequestException;
use CommunitySDKs\GoDaddy\Exception\Subscriptions\SubscriptionsForbiddenException;
use CommunitySDKs\GoDaddy\Exception\Subscriptions\SubscriptionsGatewayTimeoutException;
use CommunitySDKs\GoDaddy\Exception\Subscriptions\SubscriptionsNotFoundException;
use CommunitySDKs\GoDaddy\Exception\Subscriptions\SubscriptionsRateLimitException;
use CommunitySDKs\GoDaddy\Exception\Subscriptions\SubscriptionsServerException;
use CommunitySDKs\GoDaddy\Exception\Subscriptions\SubscriptionsUnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\Subscriptions\SubscriptionsUnprocessableEntityException;

final class SubscriptionsService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL, 'subscriptions');
    }

    public function list(ListSubscriptionsRequest $request): SubscriptionListResponse
    {
        try {
            $response = $this->call(
                'GET',
                '/v1/subscriptions',
                queryParams: $request->toQueryParams(),
                headers: $request->toHeaders()
            );

            return SubscriptionListResponse::fromArray($this->expectAssocArray($response));
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    public function productGroups(SubscriptionProductGroupsRequest $request): ProductGroupListResponse
    {
        try {
            $response = $this->call('GET', '/v1/subscriptions/productGroups', headers: $request->toHeaders());
            return ProductGroupListResponse::fromArray($this->expectListArray($response));
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    public function cancel(SubscriptionRequest $request): CancelSubscriptionResponse
    {
        try {
            $this->call(
                'DELETE',
                '/v1/subscriptions/{subscriptionId}',
                pathParams: $request->toPathParams(),
                headers: $request->toHeaders()
            );

            return new CancelSubscriptionResponse();
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    public function get(SubscriptionRequest $request): SubscriptionResponse
    {
        try {
            $response = $this->call(
                'GET',
                '/v1/subscriptions/{subscriptionId}',
                pathParams: $request->toPathParams(),
                headers: $request->toHeaders()
            );

            return SubscriptionResponse::fromArray($this->expectAssocArray($response));
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    public function update(UpdateSubscriptionRequest $request): UpdateSubscriptionResponse
    {
        try {
            $this->call(
                'PATCH',
                '/v1/subscriptions/{subscriptionId}',
                pathParams: $request->toPathParams(),
                headers: $request->toHeaders(),
                body: $request->subscription->toArray()
            );

            return new UpdateSubscriptionResponse();
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    private function expectAssocArray(mixed $response): array
    {
        if (is_array($response) && (array_is_list($response) === false || $response === [])) {
            return $response;
        }

        throw new \UnexpectedValueException('Expected JSON object response array from GoDaddy subscriptions API.');
    }

    private function expectListArray(mixed $response): array
    {
        if (is_array($response)) {
            return $response;
        }

        throw new \UnexpectedValueException('Expected JSON array response list from GoDaddy subscriptions API.');
    }

    private function mapException(ApiException $exception): SubscriptionsApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(SubscriptionsBadRequestException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            401 => $this->rebuildException(SubscriptionsUnauthorizedException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            403 => $this->rebuildException(SubscriptionsForbiddenException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            404 => $this->rebuildException(SubscriptionsNotFoundException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            422 => $this->rebuildException(SubscriptionsUnprocessableEntityException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            429 => $this->rebuildException(SubscriptionsRateLimitException::class, $exception, ErrorLimitResponse::fromArray($this->decodeErrorBody($exception))),
            504 => $this->rebuildException(SubscriptionsGatewayTimeoutException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            default => $this->rebuildException(SubscriptionsServerException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
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
     * @param class-string<SubscriptionsApiException> $class
     */
    private function rebuildException(string $class, ApiException $exception, object $errorResponse): SubscriptionsApiException
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
