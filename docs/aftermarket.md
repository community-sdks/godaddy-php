# Aftermarket Service

Client accessor: `$client->aftermarket()`

## Method Index

- [`getListings`](#getlistings): `ListingsResponse`
- [`deleteListings`](#deletelistings): `ListingActionResponse`
- [`addExpiryListings`](#addexpirylistings): `ListingActionResponse`

## Methods

### getListings

Returns: `ListingsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Request\GetListingsRequest;

$response = $client->aftermarket()->getListings(new GetListingsRequest(
    customerId: '123456789'
));
```

Response JSON example:

```json
{
  "listings": [
    {
      "fqdn": "example.com",
      "listingId": 1001,
      "listingStatus": "ACTIVE",
      "price": 2499,
      "currency": "USD"
    }
  ],
  "pagination": {
    "total": 1,
    "start": 0,
    "limit": 20
  }
}
```

### deleteListings

Returns: `ListingActionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Request\DeleteListingsRequest;

$response = $client->aftermarket()->deleteListings(new DeleteListingsRequest(
    domains: ['example.com']
));
```

Response JSON example:

```json
{
  "listingActionId": 900122
}
```

### addExpiryListings

Returns: `ListingActionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Request\AddExpiryListingsRequest;

$response = $client->aftermarket()->addExpiryListings(new AddExpiryListingsRequest(
    expiryListings: []
));
```

Response JSON example:

```json
{
  "listingActionId": 900122
}
```

## Exceptions

Service-specific exceptions are under `CommunitySDKs\GoDaddy\Exception\Aftermarket\*` and expose `getErrorResponse()`.






