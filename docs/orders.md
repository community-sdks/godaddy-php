# Orders Service

Client accessor: `$client->orders()`

## Method Index

- [`list`](#list): `OrderListResponse`
- [`get`](#get): `OrderResponse`

## Methods

### list

Returns: `OrderListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Orders\Request\ListOrdersRequest;

$response = $client->orders()->list(new ListOrdersRequest(
    xAppKey: 'app_abc123'
));
```

Response JSON example:

```json
{
  "orders": [
    {
      "orderId": "1234567890",
      "currency": "USD",
      "createdAt": "2026-03-11T12:00:00Z"
    }
  ],
  "pagination": {
    "total": 1,
    "next": null
  }
}
```

### get

Returns: `OrderResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Orders\Request\GetOrderRequest;

$response = $client->orders()->get(new GetOrderRequest(
    orderId: '1234567890',
    xAppKey: 'app_abc123'
));
```

Response JSON example:

```json
{
  "orderId": "1234567890",
  "currency": "USD",
  "createdAt": "2026-03-11T12:00:00Z",
  "status": "PENDING",
  "pricing": {
    "total": "14.99"
  },
  "items": [
    {
      "itemId": "line-1",
      "label": "example.com",
      "status": "PENDING"
    }
  ]
}
```

## Exceptions

Service-specific exceptions are under `CommunitySDKs\GoDaddy\Exception\Orders\*` and expose `getErrorResponse()`.






