<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\Dto\Orders\Request\GetOrderRequest;
use CommunitySDKs\GoDaddy\Dto\Orders\Request\ListOrdersRequest;
use CommunitySDKs\GoDaddy\Dto\Orders\Response\ErrorLimitResponse;
use CommunitySDKs\GoDaddy\Dto\Orders\Response\ErrorResponse;
use CommunitySDKs\GoDaddy\Dto\Orders\Response\OrderListResponse;
use CommunitySDKs\GoDaddy\Dto\Orders\Response\OrderResponse;
use CommunitySDKs\GoDaddy\Exception\ApiException;
use CommunitySDKs\GoDaddy\Exception\Orders\OrdersApiException;
use CommunitySDKs\GoDaddy\Exception\Orders\OrdersBadRequestException;
use CommunitySDKs\GoDaddy\Exception\Orders\OrdersForbiddenException;
use CommunitySDKs\GoDaddy\Exception\Orders\OrdersGatewayTimeoutException;
use CommunitySDKs\GoDaddy\Exception\Orders\OrdersNotFoundException;
use CommunitySDKs\GoDaddy\Exception\Orders\OrdersRateLimitException;
use CommunitySDKs\GoDaddy\Exception\Orders\OrdersServerException;
use CommunitySDKs\GoDaddy\Exception\Orders\OrdersUnauthorizedException;

final class OrdersService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function list(ListOrdersRequest $request): OrderListResponse
    {
        try {
            $response = $this->call(
                'GET',
                '/v1/orders',
                queryParams: $request->toQueryParams(),
                headers: $request->toHeaders()
            );

            return OrderListResponse::fromArray($this->expectAssocArray($response));
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    public function get(GetOrderRequest $request): OrderResponse
    {
        try {
            $response = $this->call(
                'GET',
                '/v1/orders/{orderId}',
                pathParams: $request->toPathParams(),
                headers: $request->toHeaders()
            );

            return OrderResponse::fromArray($this->expectAssocArray($response));
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    private function expectAssocArray(mixed $response): array
    {
        if (is_array($response) && (array_is_list($response) === false || $response === [])) {
            return $response;
        }

        throw new \UnexpectedValueException('Expected JSON object response array from GoDaddy orders API.');
    }

    private function mapException(ApiException $exception): OrdersApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(OrdersBadRequestException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            401 => $this->rebuildException(OrdersUnauthorizedException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            403 => $this->rebuildException(OrdersForbiddenException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            404 => $this->rebuildException(OrdersNotFoundException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            429 => $this->rebuildException(OrdersRateLimitException::class, $exception, ErrorLimitResponse::fromArray($this->decodeErrorBody($exception))),
            504 => $this->rebuildException(OrdersGatewayTimeoutException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            default => $this->rebuildException(OrdersServerException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
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
     * @param class-string<OrdersApiException> $class
     */
    private function rebuildException(string $class, ApiException $exception, object $errorResponse): OrdersApiException
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
