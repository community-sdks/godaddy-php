# Abuse Service

This document covers the Abuse service in the GoDaddy PHP SDK.

Client accessor: `$client->abuse()`

All methods now use typed request DTOs and typed response DTOs.

## Methods

- `getTickets(GetTicketsRequest $request): AbuseResponse`
- `createTicket(CreateTicketRequest $request): AbuseResponse`
- `getTicketInfo(GetTicketInfoRequest $request): AbuseResponse`
- `getTicketsV2(GetTicketsV2Request $request): AbuseResponse`
- `createTicketV2(CreateTicketV2Request $request): AbuseResponse`
- `getTicketInfoV2(GetTicketInfoV2Request $request): AbuseResponse`

## Example

```php
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\GetTicketsRequest;

$response = $client->abuse()->getTickets(new GetTicketsRequest(
    type: 'PHISHING',
    closed: false,
    limit: 50,
    offset: 0
));

$data = $response->data;
```

## Exceptions

Abuse endpoints now throw dedicated exceptions in `CommunitySDKs\GoDaddy\Exception\Abuse\*`:

- `AbuseUnauthorizedException`
- `AbuseForbiddenException`
- `AbuseNotFoundException`
- `AbuseUnprocessableEntityException`
- `AbuseServerException`

Each exception extends `AbuseApiException` and exposes `getErrorResponse()`.

