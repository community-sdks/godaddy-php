# Subscriptions Service

This document covers the Subscriptions service in the GoDaddy PHP SDK. It wraps the **GoDaddy API** endpoints from the provided Swagger file.

Client accessor: ``$client->subscriptions()``

## list

Retrieve a list of Subscriptions for the specified Shopper

- HTTP method: ``GET``
- Path: ``/v1/subscriptions``
- Swagger operationId: ``list``

### Input

```php
$response = $client->subscriptions()->list(
    xAppKey: 'header-value',
    xShopperId: 'header-value',
    xMarketId: 'header-value',
    productGroupKeys: ['sample'],
    includes: ['sample'],
    offset: 1,
    limit: 1,
    sort: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/subscriptions",
  "summary": "Retrieve a list of Subscriptions for the specified Shopper",
  "data": {}
}
```

## productGroups

Retrieve a list of ProductGroups for the specified Shopper

- HTTP method: ``GET``
- Path: ``/v1/subscriptions/productGroups``
- Swagger operationId: ``productGroups``

### Input

```php
$response = $client->subscriptions()->productGroups(
    xAppKey: 'header-value',
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/subscriptions/productGroups",
  "summary": "Retrieve a list of ProductGroups for the specified Shopper",
  "data": {}
}
```

## cancel

Cancel the specified Subscription

- HTTP method: ``DELETE``
- Path: ``/v1/subscriptions/{subscriptionId}``
- Swagger operationId: ``cancel``

### Input

```php
$response = $client->subscriptions()->cancel(
    subscriptionId: ['sample' => true],
    xAppKey: 'header-value',
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "DELETE",
  "path": "/v1/subscriptions/{subscriptionId}",
  "summary": "Cancel the specified Subscription",
  "data": {}
}
```

## get

Retrieve details for the specified Subscription

- HTTP method: ``GET``
- Path: ``/v1/subscriptions/{subscriptionId}``
- Swagger operationId: ``get``

### Input

```php
$response = $client->subscriptions()->get(
    subscriptionId: ['sample' => true],
    xAppKey: 'header-value',
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/subscriptions/{subscriptionId}",
  "summary": "Retrieve details for the specified Subscription",
  "data": {}
}
```

## update

Update details for the specified Subscription

- HTTP method: ``PATCH``
- Path: ``/v1/subscriptions/{subscriptionId}``
- Swagger operationId: ``update``

### Input

```php
$response = $client->subscriptions()->update(
    subscriptionId: ['sample' => true],
    xAppKey: 'header-value',
    subscription: ['sample'],
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "PATCH",
  "path": "/v1/subscriptions/{subscriptionId}",
  "summary": "Update details for the specified Subscription",
  "data": {}
}
```

