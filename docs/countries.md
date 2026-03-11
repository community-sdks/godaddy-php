# Countries Service

Client accessor: `$client->countries()`

## Method Index

- [`getCountries`](#getcountries): `CountriesListResponse`
- [`getCountry`](#getcountry): `CountryListResponse`

## Methods

### getCountries

Returns: `CountriesListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Countries\Request\GetCountriesRequest;

$response = $client->countries()->getCountries(new GetCountriesRequest(
    marketId: 'en-US'
));
```

Response JSON example:

```json
{
  "countryKey": "US",
  "label": "United States",
  "callingCode": "1"
}
```

### getCountry

Returns: `CountryListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Countries\Request\GetCountryRequest;

$response = $client->countries()->getCountry(new GetCountryRequest(
    countryKey: 'example',
    marketId: 'en-US'
));
```

Response JSON example:

```json
{
  "countryKey": "US",
  "label": "United States",
  "states": [
    {
      "stateKey": "AZ",
      "label": "Arizona"
    }
  ]
}
```

## Exceptions

Service-specific exceptions are under `CommunitySDKs\GoDaddy\Exception\Countries\*` and expose `getErrorResponse()`.






