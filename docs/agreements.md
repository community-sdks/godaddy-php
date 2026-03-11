# Agreements Service

This document covers the Agreements service in the GoDaddy PHP SDK.

Client accessor: `$client->agreements()`

All methods now use typed request DTOs and typed response DTOs.

## Methods

- `get(GetAgreementsRequest $request): AgreementsListResponse`

## Example

```php
use CommunitySDKs\GoDaddy\Dto\Agreements\Request\GetAgreementsRequest;

$response = $client->agreements()->get(new GetAgreementsRequest(
  keys: ['DNRA'],
  xPrivateLabelId: 1,
  xMarketId: 'en-US'
));

foreach ($response->agreements as $agreement) {
  echo $agreement->agreementKey . PHP_EOL;
}
```

## Exceptions

Agreements endpoints now throw dedicated exceptions in `CommunitySDKs\GoDaddy\Exception\Agreements\*`:

- `AgreementsBadRequestException`
- `AgreementsUnauthorizedException`
- `AgreementsForbiddenException`
- `AgreementsRateLimitException`
- `AgreementsServerException`

Each exception extends `AgreementsApiException` and exposes `getErrorResponse()`.

