# Ans Service

This document covers the Ans service in the GoDaddy PHP SDK.

Client accessor: `$client->ans()`

All methods now use typed request DTOs and typed response DTOs.

## Methods

- `search(SearchAgentsRequest $request): AnsResponse`
- `register(RegisterAgentRequest $request): AnsResponse`
- `resolve(ResolveAgentRequest $request): AnsResponse`
- `get(GetAgentRequest $request): AnsResponse`
- `revoke(RevokeAgentRequest $request): AnsResponse`
- `verifyAcme(VerifyAcmeRequest $request): AnsResponse`
- `verifyDns(VerifyDnsRequest $request): AnsResponse`
- `getIdentityCertificates(GetIdentityCertificatesRequest $request): AnsResponse`
- `submitIdentityCsr(SubmitIdentityCsrRequest $request): AnsResponse`
- `getServerCertificates(GetServerCertificatesRequest $request): AnsResponse`
- `submitServerCsr(SubmitServerCsrRequest $request): AnsResponse`
- `getCsrStatus(GetCsrStatusRequest $request): AnsResponse`
- `events(GetAgentEventsRequest $request): AnsResponse`

## Example

```php
use CommunitySDKs\GoDaddy\Dto\Ans\Request\SearchAgentsRequest;

$response = $client->ans()->search(new SearchAgentsRequest(
    agentDisplayName: 'Sentiment',
    protocol: 'MCP',
    limit: 20,
    offset: 0
));

$data = $response->data;
```

## Exceptions

ANS endpoints now throw dedicated exceptions in `CommunitySDKs\GoDaddy\Exception\Ans\*`:

- `AnsBadRequestException`
- `AnsUnauthorizedException`
- `AnsForbiddenException`
- `AnsNotFoundException`
- `AnsConflictException`
- `AnsUnprocessableEntityException`
- `AnsRateLimitException`
- `AnsServerException`

Each exception extends `AnsApiException` and exposes `getErrorResponse()`.

