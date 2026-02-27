# Agreements Service

This document covers the Agreements service in the GoDaddy PHP SDK. It wraps the **GoDaddy API** endpoints from the provided Swagger file.

Client accessor: ``$client->agreements()``

## get

Retrieve Legal Agreements for provided agreements keys

- HTTP method: ``GET``
- Path: ``/v1/agreements``
- Swagger operationId: ``get``

### Input

```php
$response = $client->agreements()->get(
    keys: ['sample'],
    xPrivateLabelId: 'header-value',
    xMarketId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/agreements",
  "summary": "Retrieve Legal Agreements for provided agreements keys",
  "data": {}
}
```

