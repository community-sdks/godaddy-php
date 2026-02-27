# Countries Service

This document covers the Countries service in the GoDaddy PHP SDK. It wraps the **GoDaddy API** endpoints from the provided Swagger file.

Client accessor: ``$client->countries()``

## getCountries

Retrieves summary country information for the provided marketId and filters

- HTTP method: ``GET``
- Path: ``/v1/countries``
- Swagger operationId: ``getCountries``

### Input

```php
$response = $client->countries()->getCountries(
    marketId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/countries",
  "summary": "Retrieves summary country information for the provided marketId and filters",
  "data": {}
}
```

## getCountry

Retrieves country and summary state information for provided countryKey

- HTTP method: ``GET``
- Path: ``/v1/countries/{countryKey}``
- Swagger operationId: ``getCountry``

### Input

```php
$response = $client->countries()->getCountry(
    countryKey: 'sample',
    marketId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/countries/{countryKey}",
  "summary": "Retrieves country and summary state information for provided countryKey",
  "data": {}
}
```

