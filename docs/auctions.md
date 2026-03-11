# Auctions Service

Client accessor: `$client->auctions()`

## Method Index

- [`placeBids`](#placebids): `PlaceBidsResponse`

## Methods

### placeBids

Returns: `PlaceBidsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Auctions\Request\PlaceBidsRequest;

$response = $client->auctions()->placeBids(new PlaceBidsRequest(
    customerId: '123456789',
    requestBody: [[]]
));
```

Response JSON example:

```json
{
  "listingId": 200000,
  "bidId": "bid_001",
  "bidAmountUsd": 1500,
  "status": "ACTIVE",
  "isHighestBidder": true
}
```

## Exceptions

Service-specific exceptions are under `CommunitySDKs\GoDaddy\Exception\Auctions\*` and expose `getErrorResponse()`.






