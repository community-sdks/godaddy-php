# Orders Service

This document covers the Orders service in the GoDaddy PHP SDK.

Client accessor: `$client->orders()`

All methods now use typed request DTOs and typed response DTOs.

## Methods

- `list(ListOrdersRequest $request): OrderListResponse`
- `get(GetOrderRequest $request): OrderResponse`

## Example

```php
use CommunitySDKs\GoDaddy\Dto\Orders\Request\ListOrdersRequest;

$response = $client->orders()->list(new ListOrdersRequest(
    xAppKey: 'app-key',
    limit: 25,
    sort: '-createdAt',
));

foreach ($response->orders as $order) {
    echo $order->orderId . PHP_EOL;
}
```

## Exceptions

Orders endpoints now throw dedicated exceptions in `CommunitySDKs\GoDaddy\Exception\Orders\*`:

- `OrdersBadRequestException`
- `OrdersUnauthorizedException`
- `OrdersForbiddenException`
- `OrdersNotFoundException`
- `OrdersRateLimitException`
- `OrdersServerException`
- `OrdersGatewayTimeoutException`

Each exception extends `OrdersApiException` and exposes `getErrorResponse()`.
