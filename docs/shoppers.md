# Shoppers Service

This document covers the Shoppers service in the GoDaddy PHP SDK. It wraps the **GoDaddy API** endpoints from the provided Swagger file.

Client accessor: ``$client->shoppers()``

## createSubaccount

Create a Subaccount owned by the authenticated Reseller

- HTTP method: ``POST``
- Path: ``/v1/shoppers/subaccount``
- Swagger operationId: ``createSubaccount``

### Input

```php
$response = $client->shoppers()->createSubaccount(
    subaccount: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/shoppers/subaccount",
  "summary": "Create a Subaccount owned by the authenticated Reseller",
  "data": {}
}
```

## get

Get details for the specified Shopper

- HTTP method: ``GET``
- Path: ``/v1/shoppers/{shopperId}``
- Swagger operationId: ``get``

### Input

```php
$response = $client->shoppers()->get(
    shopperId: ['sample' => true],
    includes: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/shoppers/{shopperId}",
  "summary": "Get details for the specified Shopper",
  "data": {}
}
```

## update

Update details for the specified Shopper

- HTTP method: ``POST``
- Path: ``/v1/shoppers/{shopperId}``
- Swagger operationId: ``update``

### Input

```php
$response = $client->shoppers()->update(
    shopperId: ['sample' => true],
    shopper: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/shoppers/{shopperId}",
  "summary": "Update details for the specified Shopper",
  "data": {}
}
```

## delete

Request the deletion of a shopper profile

- HTTP method: ``DELETE``
- Path: ``/v1/shoppers/{shopperId}``
- Swagger operationId: ``delete``

### Input

```php
$response = $client->shoppers()->delete(
    shopperId: ['sample' => true],
    auditClientIp: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "DELETE",
  "path": "/v1/shoppers/{shopperId}",
  "summary": "Request the deletion of a shopper profile",
  "data": {}
}
```

## getStatus

Get details for the specified Shopper

- HTTP method: ``GET``
- Path: ``/v1/shoppers/{shopperId}/status``
- Swagger operationId: ``getStatus``

### Input

```php
$response = $client->shoppers()->getStatus(
    shopperId: ['sample' => true],
    auditClientIp: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/shoppers/{shopperId}/status",
  "summary": "Get details for the specified Shopper",
  "data": {}
}
```

## changePassword

Set subaccount's password

- HTTP method: ``PUT``
- Path: ``/v1/shoppers/{shopperId}/factors/password``
- Swagger operationId: ``changePassword``

### Input

```php
$response = $client->shoppers()->changePassword(
    shopperId: ['sample' => true],
    secret: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "PUT",
  "path": "/v1/shoppers/{shopperId}/factors/password",
  "summary": "Set subaccount's password",
  "data": {}
}
```

