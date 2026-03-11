# Agreements Service

Client accessor: `$client->agreements()`

## Method Index

- [`get`](#get): `AgreementsListResponse`

## Methods

### get

Returns: `AgreementsListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Agreements\Request\GetAgreementsRequest;

$response = $client->agreements()->get(new GetAgreementsRequest(
    keys: []
));
```

Response JSON example:

```json
{
  "agreementKey": "DNRA",
  "title": "Domain Name Registration Agreement",
  "url": "https://www.godaddy.com/legal/agreements/domain-registration"
}
```

## Exceptions

Service-specific exceptions are under `CommunitySDKs\GoDaddy\Exception\Agreements\*` and expose `getErrorResponse()`.






