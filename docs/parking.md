# Parking Service

This document covers the Parking service in the GoDaddy PHP SDK.

Client accessor: `$client->parking()`

All methods now use typed request DTOs and typed response DTOs.

## Methods

- `getMetrics(GetParkingMetricsRequest $request): MetricListResponse`
- `getMetricsByDomain(GetParkingMetricsByDomainRequest $request): MetricByDomainListResponse`

## Example

```php
use CommunitySDKs\GoDaddy\Dto\Parking\Request\GetParkingMetricsRequest;

$response = $client->parking()->getMetrics(new GetParkingMetricsRequest(
    customerId: 'MY',
    periodStartPtz: '2026-03-01',
    periodEndPtz: '2026-03-10',
    limit: 20,
));

foreach ($response->metrics as $metric) {
    echo $metric->periodPtz . ': ' . $metric->visitCount . PHP_EOL;
}
```

## Exceptions

Parking endpoints now throw dedicated exceptions in `CommunitySDKs\GoDaddy\Exception\Parking\*`:

- `ParkingBadRequestException`
- `ParkingUnauthorizedException`
- `ParkingForbiddenException`
- `ParkingUnprocessableEntityException`
- `ParkingRateLimitException`
- `ParkingServerException`

Each exception extends `ParkingApiException` and exposes `getErrorResponse()`.
