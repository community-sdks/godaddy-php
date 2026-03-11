# Abuse Service

Client accessor: `$client->abuse()`

## Method Index

- [`getTickets`](#gettickets): `AbuseTicketListResponse`
- [`createTicket`](#createticket): `AbuseTicketIdResponse`
- [`getTicketInfo`](#getticketinfo): `AbuseTicketDetailsResponse`
- [`getTicketsV2`](#getticketsv2): `AbuseTicketListResponse`
- [`createTicketV2`](#createticketv2): `AbuseTicketIdResponse`
- [`getTicketInfoV2`](#getticketinfov2): `AbuseTicketDetailsResponse`

## Methods

### getTickets

Returns: `AbuseTicketListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\GetTicketsRequest;

$response = $client->abuse()->getTickets(new GetTicketsRequest());
```

Response JSON example:

```json
{
  "ticketIds": [
    "TCK-100001"
  ],
  "pagination": {
    "total": 1,
    "start": 0,
    "limit": 25
  }
}
```

### createTicket

Returns: `AbuseTicketIdResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\CreateTicketRequest;

$response = $client->abuse()->createTicket(new CreateTicketRequest(
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "ticketId": "TCK-100001"
}
```

### getTicketInfo

Returns: `AbuseTicketDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\GetTicketInfoRequest;

$response = $client->abuse()->getTicketInfo(new GetTicketInfoRequest(
    ticketId: 'TCK-100001'
));
```

Response JSON example:

```json
{
  "ticketId": "TCK-100001",
  "type": "PHISHING",
  "source": "203.0.113.10",
  "target": "example.com",
  "closed": false,
  "notes": [
    {
      "message": "Initial report",
      "createdAt": "2026-03-11T12:00:00Z"
    }
  ]
}
```

### getTicketsV2

Returns: `AbuseTicketListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\GetTicketsV2Request;

$response = $client->abuse()->getTicketsV2(new GetTicketsV2Request());
```

Response JSON example:

```json
{
  "ticketIds": [
    "TCK-100001"
  ],
  "pagination": {
    "total": 1,
    "start": 0,
    "limit": 25
  }
}
```

### createTicketV2

Returns: `AbuseTicketIdResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\CreateTicketV2Request;

$response = $client->abuse()->createTicketV2(new CreateTicketV2Request(
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "ticketId": "TCK-100001"
}
```

### getTicketInfoV2

Returns: `AbuseTicketDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\GetTicketInfoV2Request;

$response = $client->abuse()->getTicketInfoV2(new GetTicketInfoV2Request(
    ticketId: 'TCK-100001'
));
```

Response JSON example:

```json
{
  "ticketId": "TCK-100001",
  "type": "PHISHING",
  "source": "203.0.113.10",
  "target": "example.com",
  "closed": false,
  "notes": [
    {
      "message": "Initial report",
      "createdAt": "2026-03-11T12:00:00Z"
    }
  ]
}
```

## Exceptions

Service-specific exceptions are under `CommunitySDKs\GoDaddy\Exception\Abuse\*` and expose `getErrorResponse()`.






