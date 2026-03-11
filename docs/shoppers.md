# Shoppers Service

Client accessor: `$client->shoppers()`

## Method Index

- [`createSubaccount`](#createsubaccount): `ShopperIdResponse`
- [`get`](#get): `ShopperResponse`
- [`update`](#update): `ShopperIdResponse`
- [`delete`](#delete): `DeleteShopperResponse`
- [`getStatus`](#getstatus): `ShopperStatusResponse`
- [`changePassword`](#changepassword): `ShopperIdResponse`

## Methods

### createSubaccount

Returns: `ShopperIdResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\CreateSubaccountRequest;

$response = $client->shoppers()->createSubaccount(new CreateSubaccountRequest(
    email: 'admin@example.com',
    password: 'P@ssw0rd123!',
    nameFirst: 'example',
    nameLast: 'example'
));
```

Response JSON example:

```json
{
  "shopperId": "987654321",
  "customerId": "123456789"
}
```

### get

Returns: `ShopperResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\GetShopperRequest;

$response = $client->shoppers()->get(new GetShopperRequest(
    shopperId: '123456789'
));
```

Response JSON example:

```json
{
  "shopperId": "987654321",
  "nameFirst": "Jane",
  "nameLast": "Doe",
  "email": "admin@example.com",
  "marketId": "en-US",
  "customerId": "123456789"
}
```

### update

Returns: `ShopperIdResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\UpdateShopperRequest;

$response = $client->shoppers()->update(new UpdateShopperRequest(
    shopperId: '123456789'
));
```

Response JSON example:

```json
{
  "shopperId": "987654321",
  "customerId": "123456789"
}
```

### delete

Returns: `DeleteShopperResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\DeleteShopperRequest;

$response = $client->shoppers()->delete(new DeleteShopperRequest(
    shopperId: '123456789',
    auditClientIp: '203.0.113.10'
));
```

Response JSON example:

```json
{
  "deleted": true
}
```

### getStatus

Returns: `ShopperStatusResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\GetShopperStatusRequest;

$response = $client->shoppers()->getStatus(new GetShopperStatusRequest(
    shopperId: '123456789',
    auditClientIp: '203.0.113.10'
));
```

Response JSON example:

```json
{
  "billingState": "ACTIVE"
}
```

### changePassword

Returns: `ShopperIdResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\ChangePasswordRequest;

$response = $client->shoppers()->changePassword(new ChangePasswordRequest(
    shopperId: '123456789',
    secret: 'P@ssw0rd123!'
));
```

Response JSON example:

```json
{
  "shopperId": "987654321",
  "customerId": "123456789"
}
```

## Exceptions

Service-specific exceptions are under `CommunitySDKs\GoDaddy\Exception\Shoppers\*` and expose `getErrorResponse()`.






