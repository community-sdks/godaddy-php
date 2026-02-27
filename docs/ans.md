# Ans Service

This document covers the Ans service in the GoDaddy PHP SDK. It wraps the **Agent Name Service (ANS) API** endpoints from the provided Swagger file.

Client accessor: ``$client->ans()``

## searchANSName

Search the ANSName Registry with flexible criteria

- HTTP method: ``GET``
- Path: ``/v1/agents``
- Swagger operationId: ``searchANSName``

### Input

```php
$response = $client->ans()->searchANSName(
    agentDisplayName: 'sample',
    version: 'sample',
    agentHost: 'sample',
    protocol: 'sample',
    limit: 1,
    offset: 1,
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/agents",
  "summary": "Search the ANSName Registry with flexible criteria",
  "data": {}
}
```

## registerAgent

Register a new agent with the ANS

- HTTP method: ``POST``
- Path: ``/v1/agents/register``
- Swagger operationId: ``registerAgent``

### Input

```php
$response = $client->ans()->registerAgent(
    body: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/agents/register",
  "summary": "Register a new agent with the ANS",
  "data": {}
}
```

## resolveANSName

Resolve an ANSName to an endpoint

- HTTP method: ``POST``
- Path: ``/v1/agents/resolution``
- Swagger operationId: ``resolveANSName``

### Input

```php
$response = $client->ans()->resolveANSName(
    body: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/agents/resolution",
  "summary": "Resolve an ANSName to an endpoint",
  "data": {}
}
```

## getAgent

Get agent details

- HTTP method: ``GET``
- Path: ``/v1/agents/{agentId}``
- Swagger operationId: ``getAgent``

### Input

```php
$response = $client->ans()->getAgent(
    agentId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/agents/{agentId}",
  "summary": "Get agent details",
  "data": {}
}
```

## validateRegistration

Trigger ACME validation

- HTTP method: ``POST``
- Path: ``/v1/agents/{agentId}/verify-acme``
- Swagger operationId: ``validateRegistration``

### Input

```php
$response = $client->ans()->validateRegistration(
    agentId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/agents/{agentId}/verify-acme",
  "summary": "Trigger ACME validation",
  "data": {}
}
```

## verifyDnsRecords

Verify DNS records configured

- HTTP method: ``POST``
- Path: ``/v1/agents/{agentId}/verify-dns``
- Swagger operationId: ``verifyDnsRecords``

### Input

```php
$response = $client->ans()->verifyDnsRecords(
    agentId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/agents/{agentId}/verify-dns",
  "summary": "Verify DNS records configured",
  "data": {}
}
```

## getAgentIdentityCertificateByAgentId

Get agent's identity certificates

- HTTP method: ``GET``
- Path: ``/v1/agents/{agentId}/certificates/identity``
- Swagger operationId: ``getAgentIdentityCertificateByAgentId``

### Input

```php
$response = $client->ans()->getAgentIdentityCertificateByAgentId(
    agentId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/agents/{agentId}/certificates/identity",
  "summary": "Get agent's identity certificates",
  "data": {}
}
```

## submitAgentIdentityCsrByAgentId

Submit identity certificate CSR

- HTTP method: ``POST``
- Path: ``/v1/agents/{agentId}/certificates/identity``
- Swagger operationId: ``submitAgentIdentityCsrByAgentId``

### Input

```php
$response = $client->ans()->submitAgentIdentityCsrByAgentId(
    agentId: 'sample',
    body: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/agents/{agentId}/certificates/identity",
  "summary": "Submit identity certificate CSR",
  "data": {}
}
```

## getAgentServerCertificateByAgentId

Get agent's server certificates

- HTTP method: ``GET``
- Path: ``/v1/agents/{agentId}/certificates/server``
- Swagger operationId: ``getAgentServerCertificateByAgentId``

### Input

```php
$response = $client->ans()->getAgentServerCertificateByAgentId(
    agentId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/agents/{agentId}/certificates/server",
  "summary": "Get agent's server certificates",
  "data": {}
}
```

## submitAgentServerCsrByAgentId

Submit server certificate CSR

- HTTP method: ``POST``
- Path: ``/v1/agents/{agentId}/certificates/server``
- Swagger operationId: ``submitAgentServerCsrByAgentId``

### Input

```php
$response = $client->ans()->submitAgentServerCsrByAgentId(
    agentId: 'sample',
    body: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/agents/{agentId}/certificates/server",
  "summary": "Submit server certificate CSR",
  "data": {}
}
```

## getAgentCsrStatusByAgentId

Get CSR status

- HTTP method: ``GET``
- Path: ``/v1/agents/{agentId}/csrs/{csrId}/status``
- Swagger operationId: ``getAgentCsrStatusByAgentId``

### Input

```php
$response = $client->ans()->getAgentCsrStatusByAgentId(
    agentId: 'sample',
    csrId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/agents/{agentId}/csrs/{csrId}/status",
  "summary": "Get CSR status",
  "data": {}
}
```

## getAgentEvents

Retrieve ANS agent events

- HTTP method: ``GET``
- Path: ``/v1/agents/events``
- Swagger operationId: ``getAgentEvents``

### Input

```php
$response = $client->ans()->getAgentEvents(
    xRequestId: 'header-value',
    providerId: 'sample',
    lastLogId: 'sample',
    limit: 1,
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/agents/events",
  "summary": "Retrieve ANS agent events",
  "data": {}
}
```

