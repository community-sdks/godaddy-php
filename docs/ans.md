# ANS Service

Client accessor: `$client->ans()`

## Method Index

- [`search`](#search): `AgentSearchResponse`
- [`register`](#register): `AgentDetailsResponse`
- [`resolve`](#resolve): `AgentDetailsResponse`
- [`get`](#get): `AgentDetailsResponse`
- [`revoke`](#revoke): `AgentDetailsResponse`
- [`verifyAcme`](#verifyacme): `AgentDetailsResponse`
- [`verifyDns`](#verifydns): `AgentDetailsResponse`
- [`getIdentityCertificates`](#getidentitycertificates): `CertificateListResponse`
- [`submitIdentityCsr`](#submitidentitycsr): `CsrSubmissionResponse`
- [`getServerCertificates`](#getservercertificates): `CertificateListResponse`
- [`submitServerCsr`](#submitservercsr): `CsrSubmissionResponse`
- [`getCsrStatus`](#getcsrstatus): `CsrStatusResponse`
- [`events`](#events): `EventPageResponse`

## Methods

### search

Returns: `AgentSearchResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\SearchAgentsRequest;

$response = $client->ans()->search(new SearchAgentsRequest());
```

Response JSON example:

```json
{
  "agents": [
    {
      "agentId": "agt_001",
      "displayName": "Checkout Agent",
      "protocol": "MCP",
      "status": "ACTIVE"
    }
  ],
  "totalCount": 1,
  "returnedCount": 1,
  "limit": 10,
  "offset": 0,
  "hasMore": false
}
```

### register

Returns: `AgentDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\RegisterAgentRequest;

$response = $client->ans()->register(new RegisterAgentRequest(
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "agentId": "agt_001",
  "status": "ACTIVE",
  "displayName": "Checkout Agent",
  "endpoints": [
    {
      "url": "https://agent.example.com",
      "protocol": "MCP",
      "status": "ACTIVE"
    }
  ]
}
```

### resolve

Returns: `AgentDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\ResolveAgentRequest;

$response = $client->ans()->resolve(new ResolveAgentRequest(
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "agentId": "agt_001",
  "status": "ACTIVE",
  "displayName": "Checkout Agent",
  "endpoints": [
    {
      "url": "https://agent.example.com",
      "protocol": "MCP",
      "status": "ACTIVE"
    }
  ]
}
```

### get

Returns: `AgentDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\GetAgentRequest;

$response = $client->ans()->get(new GetAgentRequest(
    agentId: 'agt_001'
));
```

Response JSON example:

```json
{
  "agentId": "agt_001",
  "status": "ACTIVE",
  "displayName": "Checkout Agent",
  "endpoints": [
    {
      "url": "https://agent.example.com",
      "protocol": "MCP",
      "status": "ACTIVE"
    }
  ]
}
```

### revoke

Returns: `AgentDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\RevokeAgentRequest;

$response = $client->ans()->revoke(new RevokeAgentRequest(
    agentId: 'agt_001',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "agentId": "agt_001",
  "status": "ACTIVE",
  "displayName": "Checkout Agent",
  "endpoints": [
    {
      "url": "https://agent.example.com",
      "protocol": "MCP",
      "status": "ACTIVE"
    }
  ]
}
```

### verifyAcme

Returns: `AgentDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\VerifyAcmeRequest;

$response = $client->ans()->verifyAcme(new VerifyAcmeRequest(
    agentId: 'agt_001'
));
```

Response JSON example:

```json
{
  "agentId": "agt_001",
  "status": "ACTIVE",
  "displayName": "Checkout Agent",
  "endpoints": [
    {
      "url": "https://agent.example.com",
      "protocol": "MCP",
      "status": "ACTIVE"
    }
  ]
}
```

### verifyDns

Returns: `AgentDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\VerifyDnsRequest;

$response = $client->ans()->verifyDns(new VerifyDnsRequest(
    agentId: 'agt_001'
));
```

Response JSON example:

```json
{
  "agentId": "agt_001",
  "status": "ACTIVE",
  "displayName": "Checkout Agent",
  "endpoints": [
    {
      "url": "https://agent.example.com",
      "protocol": "MCP",
      "status": "ACTIVE"
    }
  ]
}
```

### getIdentityCertificates

Returns: `CertificateListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\GetIdentityCertificatesRequest;

$response = $client->ans()->getIdentityCertificates(new GetIdentityCertificatesRequest(
    agentId: 'agt_001'
));
```

Response JSON example:

```json
{
  "certificates": [
    {
      "certificateId": "crt_123",
      "status": "ISSUED",
      "expiresAt": "2027-03-11T00:00:00Z"
    }
  ]
}
```

### submitIdentityCsr

Returns: `CsrSubmissionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\SubmitIdentityCsrRequest;

$response = $client->ans()->submitIdentityCsr(new SubmitIdentityCsrRequest(
    agentId: 'agt_001',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "csrId": "csr_123"
}
```

### getServerCertificates

Returns: `CertificateListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\GetServerCertificatesRequest;

$response = $client->ans()->getServerCertificates(new GetServerCertificatesRequest(
    agentId: 'agt_001'
));
```

Response JSON example:

```json
{
  "certificates": [
    {
      "certificateId": "crt_123",
      "status": "ISSUED",
      "expiresAt": "2027-03-11T00:00:00Z"
    }
  ]
}
```

### submitServerCsr

Returns: `CsrSubmissionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\SubmitServerCsrRequest;

$response = $client->ans()->submitServerCsr(new SubmitServerCsrRequest(
    agentId: 'agt_001',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "csrId": "csr_123"
}
```

### getCsrStatus

Returns: `CsrStatusResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\GetCsrStatusRequest;

$response = $client->ans()->getCsrStatus(new GetCsrStatusRequest(
    agentId: 'agt_001',
    csrId: 'csr_123'
));
```

Response JSON example:

```json
{
  "csrId": "csr_123",
  "status": "PENDING",
  "updatedAt": "2026-03-11T12:00:00Z"
}
```

### events

Returns: `EventPageResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\GetAgentEventsRequest;

$response = $client->ans()->events(new GetAgentEventsRequest());
```

Response JSON example:

```json
{
  "items": [
    {
      "eventId": "evt_1",
      "type": "AGENT_UPDATED",
      "createdAt": "2026-03-11T12:00:00Z"
    }
  ]
}
```

## Exceptions

Service-specific exceptions are under `CommunitySDKs\GoDaddy\Exception\Ans\*` and expose `getErrorResponse()`.






