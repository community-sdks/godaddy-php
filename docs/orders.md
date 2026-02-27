# Orders Service

This document covers the Orders service in the GoDaddy PHP SDK. It wraps the **GoDaddy API** endpoints from the provided Swagger file.

Client accessor: ``$client->orders()``

## list

Retrieve a list of orders for the authenticated shopper. Only one filter may be used at a time

- HTTP method: ``GET``
- Path: ``/v1/orders``
- Swagger operationId: ``list``

### Input

```php
$response = $client->orders()->list(
    xAppKey: 'header-value',
    periodStart: 'sample',
    periodEnd: 'sample',
    domain: 'sample',
    productGroupId: 'sample',
    paymentProfileId: 'sample',
    parentOrderId: 'sample',
    offset: 1,
    limit: 1,
    sort: 'sample',
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/orders",
  "summary": "Retrieve a list of orders for the authenticated shopper. Only one filter may be used at a time",
  "data": {}
}
```

## get

Retrieve details for specified order

- HTTP method: ``GET``
- Path: ``/v1/orders/{orderId}``
- Swagger operationId: ``get``

### Input

```php
$response = $client->orders()->get(
    orderId: 'sample',
    xAppKey: 'header-value',
    xShopperId: 'header-value',
    xMarketId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/orders/{orderId}",
  "summary": "Retrieve details for specified order",
  "data": {}
}
```

