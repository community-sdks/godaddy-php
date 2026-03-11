# Auctions Service

This document covers the Auctions service in the GoDaddy PHP SDK.

Client accessor: `$client->auctions()`

All methods now use typed request DTOs and typed response DTOs.

## Methods

- `placeBids(PlaceBidsRequest $request): PlaceBidsResponse`

## Example

```php
use CommunitySDKs\GoDaddy\Dto\Auctions\Request\BidCreateRequest;
use CommunitySDKs\GoDaddy\Dto\Auctions\Request\PlaceBidsRequest;

$response = $client->auctions()->placeBids(new PlaceBidsRequest(
  customerId: '295e3bc3-b3b9-4d95-aae5-ede41a994d13',
  requestBody: [
    new BidCreateRequest(
      bidAmountUsd: 100000000,
      tosAccepted: true,
      listingId: 200000
    )
  ]
));

foreach ($response->bids as $bid) {
  echo $bid->status . PHP_EOL;
}
```

## Exceptions

Auctions endpoints now throw dedicated exceptions in `CommunitySDKs\GoDaddy\Exception\Auctions\*`:

- `AuctionsBadRequestException`
- `AuctionsUnauthorizedException`
- `AuctionsForbiddenException`
- `AuctionsUnprocessableEntityException`
- `AuctionsRateLimitException`
- `AuctionsServerException`

Each exception extends `AuctionsApiException` and exposes `getErrorResponse()`.

