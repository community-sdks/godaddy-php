# Parking Service

This document covers the Parking service in the GoDaddy PHP SDK. It wraps the **GoDaddy API** endpoints from the provided Swagger file.

Client accessor: ``$client->parking()``

## getMetrics

Returns a list of parking metrics for the specified customer, using specified filters

- HTTP method: ``GET``
- Path: ``/v1/customers/{customerId}/parking/metrics``
- Swagger operationId: ``getMetrics``

### Input

```php
$response = $client->parking()->getMetrics(
    customerId: 'sample',
    periodStartPtz: 'sample',
    periodEndPtz: 'sample',
    limit: 1,
    offset: 1,
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/customers/{customerId}/parking/metrics",
  "summary": "Returns a list of parking metrics for the specified customer, using specified filters",
  "data": {}
}
```

## getMetricsByDomain

Returns a list of domain metrics for the specified customer and portfolio, using specified filters

- HTTP method: ``GET``
- Path: ``/v1/customers/{customerId}/parking/metricsByDomain``
- Swagger operationId: ``getMetricsByDomain``

### Input

```php
$response = $client->parking()->getMetricsByDomain(
    customerId: 'sample',
    startDate: 'sample',
    endDate: 'sample',
    domains: ['sample'],
    domainLike: 'sample',
    portfolioId: 'sample',
    limit: 1,
    offset: 1,
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/customers/{customerId}/parking/metricsByDomain",
  "summary": "Returns a list of domain metrics for the specified customer and portfolio, using specified filters",
  "data": {}
}
```

