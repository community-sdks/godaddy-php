# Parking Service

Client accessor: `$client->parking()`

## Method Index

- [`getMetrics`](#getmetrics): `MetricListResponse`
- [`getMetricsByDomain`](#getmetricsbydomain): `MetricByDomainListResponse`

## Methods

### getMetrics

Returns: `MetricListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Parking\Request\GetParkingMetricsRequest;

$response = $client->parking()->getMetrics(new GetParkingMetricsRequest(
    customerId: '123456789'
));
```

Response JSON example:

```json
{
  "currencyId": "USD",
  "metrics": [
    {
      "periodPtz": "2026-03-11",
      "visitCount": 120,
      "adClickCount": 14,
      "revenue": 3450
    }
  ],
  "pagination": {
    "total": 1,
    "next": null
  }
}
```

### getMetricsByDomain

Returns: `MetricByDomainListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Parking\Request\GetParkingMetricsByDomainRequest;

$response = $client->parking()->getMetricsByDomain(new GetParkingMetricsByDomainRequest(
    customerId: '123456789',
    startDate: 'example',
    endDate: 'example'
));
```

Response JSON example:

```json
{
  "currencyId": "USD",
  "startDate": "2026-03-01",
  "endDate": "2026-03-11",
  "metrics": [
    {
      "domain": "example.com",
      "visitCount": 120,
      "pageViewCount": 200,
      "revenue": 3450
    }
  ],
  "pagination": {
    "total": 1,
    "next": null
  }
}
```

## Exceptions

Service-specific exceptions are under `CommunitySDKs\GoDaddy\Exception\Parking\*` and expose `getErrorResponse()`.






