# Countries Service

This document covers the Countries service in the GoDaddy PHP SDK.

Client accessor: `$client->countries()`

All methods now use typed request DTOs and typed response DTOs.

## Methods

- `getCountries(GetCountriesRequest $request): CountriesListResponse`
- `getCountry(GetCountryRequest $request): CountryListResponse`

## Example

```php
use CommunitySDKs\GoDaddy\Dto\Countries\Request\GetCountriesRequest;

$response = $client->countries()->getCountries(new GetCountriesRequest(
    marketId: 'en-US'
));

foreach ($response->countries as $country) {
    echo $country->countryKey . ' - ' . $country->label . PHP_EOL;
}
```

## Exceptions

Countries endpoints now throw dedicated exceptions in `CommunitySDKs\GoDaddy\Exception\Countries\*`:

- `CountriesBadRequestException`
- `CountriesUnauthorizedException`
- `CountriesForbiddenException`
- `CountriesNotFoundException`
- `CountriesUnprocessableEntityException`
- `CountriesRateLimitException`
- `CountriesServerException`

Each exception extends `CountriesApiException` and exposes `getErrorResponse()`.
