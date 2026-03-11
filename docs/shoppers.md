# Shoppers Service

This document covers the Shoppers service in the GoDaddy PHP SDK. It wraps the **GoDaddy API** endpoints from the provided Swagger file.

Client accessor: ``$client->shoppers()``

All shopper methods now use typed request DTOs and return typed response DTOs.

## createSubaccount

Create a Subaccount owned by the authenticated Reseller

- HTTP method: ``POST``
- Path: ``/v1/shoppers/subaccount``
- Swagger operationId: ``createSubaccount``

### Input (DTO)

```php
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\CreateSubaccountRequest;

$response = $client->shoppers()->createSubaccount(
  request: new CreateSubaccountRequest(
    email: 'shopper@example.com',
    password: 'P@55w0rd+',
    nameFirst: 'Jane',
    nameLast: 'Doe',
    marketId: 'en-US',
  ),
);
```

### Output (DTO)

```php
// CommunitySDKs\GoDaddy\Dto\Shoppers\Response\ShopperIdResponse
$response->shopperId;
$response->customerId;
```

## get

Get details for the specified Shopper

- HTTP method: ``GET``
- Path: ``/v1/shoppers/{shopperId}``
- Swagger operationId: ``get``

### Input (DTO)

```php
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\GetShopperRequest;

$response = $client->shoppers()->get(
  request: new GetShopperRequest(
    shopperId: '1234567890',
    includes: ['customerId'],
  ),
);
```

### Output (DTO)

```php
// CommunitySDKs\GoDaddy\Dto\Shoppers\Response\ShopperResponse
$response->shopperId;
$response->nameFirst;
$response->nameLast;
$response->email;
$response->marketId;
$response->customerId;
$response->externalId;
```

## update

Update details for the specified Shopper

- HTTP method: ``POST``
- Path: ``/v1/shoppers/{shopperId}``
- Swagger operationId: ``update``

### Input (DTO)

```php
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\UpdateShopperRequest;

$response = $client->shoppers()->update(
  request: new UpdateShopperRequest(
    shopperId: '1234567890',
    email: 'new-email@example.com',
    nameFirst: 'Jane',
    nameLast: 'Doe',
  ),
);
```

### Output (DTO)

```php
// CommunitySDKs\GoDaddy\Dto\Shoppers\Response\ShopperIdResponse
$response->shopperId;
$response->customerId;
```

## delete

Request the deletion of a shopper profile

- HTTP method: ``DELETE``
- Path: ``/v1/shoppers/{shopperId}``
- Swagger operationId: ``delete``

### Input (DTO)

```php
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\DeleteShopperRequest;

$response = $client->shoppers()->delete(
  request: new DeleteShopperRequest(
    shopperId: '1234567890',
    auditClientIp: '127.0.0.1',
  ),
);
```

### Output (DTO)

```php
// CommunitySDKs\GoDaddy\Dto\Shoppers\Response\DeleteShopperResponse
$response instanceof \CommunitySDKs\GoDaddy\Dto\Shoppers\Response\DeleteShopperResponse;
```

## getStatus

Get details for the specified Shopper

- HTTP method: ``GET``
- Path: ``/v1/shoppers/{shopperId}/status``
- Swagger operationId: ``getStatus``

### Input (DTO)

```php
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\GetShopperStatusRequest;

$response = $client->shoppers()->getStatus(
  request: new GetShopperStatusRequest(
    shopperId: '1234567890',
    auditClientIp: '127.0.0.1',
  ),
);
```

### Output (DTO)

```php
// CommunitySDKs\GoDaddy\Dto\Shoppers\Response\ShopperStatusResponse
$response->billingState;
```

## changePassword

Set subaccount's password

- HTTP method: ``PUT``
- Path: ``/v1/shoppers/{shopperId}/factors/password``
- Swagger operationId: ``changePassword``

### Input (DTO)

```php
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\ChangePasswordRequest;

$response = $client->shoppers()->changePassword(
  request: new ChangePasswordRequest(
    shopperId: '1234567890',
    secret: 'P@55w0rd+',
  ),
);
```

### Output (DTO)

```php
// CommunitySDKs\GoDaddy\Dto\Shoppers\Response\ShopperIdResponse
$response->shopperId;
$response->customerId;
```

## Shopper Exceptions

Shopper endpoints now throw dedicated typed exceptions under ``CommunitySDKs\GoDaddy\Exception\Shoppers\*``.

- ``ShoppersBadRequestException``
- ``ShoppersUnauthorizedException``
- ``ShoppersForbiddenException``
- ``ShoppersNotFoundException``
- ``ShoppersConflictException``
- ``ShoppersUnprocessableEntityException``
- ``ShoppersRateLimitException``
- ``ShoppersServerException``
- ``ShoppersPasswordPolicyException``

Each exception extends ``ShoppersApiException`` and exposes ``getErrorResponse()`` with a typed error DTO.

