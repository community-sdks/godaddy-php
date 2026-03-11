# Aftermarket Service

This document covers the Aftermarket service in the GoDaddy PHP SDK.

Client accessor: `$client->aftermarket()`

All methods now use typed request DTOs and typed response DTOs.

## Methods

- `getListings(GetListingsRequest $request): AftermarketResponse`
- `deleteListings(DeleteListingsRequest $request): AftermarketResponse`
- `addExpiryListings(AddExpiryListingsRequest $request): AftermarketResponse`

## Example

```php
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Request\GetListingsRequest;

$response = $client->aftermarket()->getListings(new GetListingsRequest(
    customerId: '295e3bc3-b3b9-4d95-aae5-ede41a994d13',
    domains: ['example.com'],
    listingStatus: 'FULFILLED',
    limit: 20,
    offset: 0
));

$data = $response->data;
```

## Exceptions

Aftermarket endpoints now throw dedicated exceptions in `CommunitySDKs\GoDaddy\Exception\Aftermarket\*`:

- `AftermarketBadRequestException`
- `AftermarketUnauthorizedException`
- `AftermarketForbiddenException`
- `AftermarketUnprocessableEntityException`
- `AftermarketRateLimitException`
- `AftermarketServerException`

Each exception extends `AftermarketApiException` and exposes `getErrorResponse()`.

