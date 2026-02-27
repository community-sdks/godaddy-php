# GoDaddy PHP SDK

This folder contains a handwritten PHP SDK for the GoDaddy Swagger files stored in the parent [`godaddy/`](../) directory. It does not ship a generator. The package is organized around one service class per GoDaddy API family.

## Installation

```bash
cd godaddy/godaddy-php
composer install
```

## Authentication

Most GoDaddy endpoints in these specs use the `sso-key` authorization header. Configure it once on the root client.

```php
use ZPMLabs\GoDaddy\Client;
use ZPMLabs\GoDaddy\Config;

$client = new Client(new Config(
    apiKey: 'your-key',
    apiSecret: 'your-secret',
));
```

For public endpoints, leave `apiKey` and `apiSecret` as `null`.

## Services

The root client exposes one accessor per API family:

- `$client->abuse()`
- `$client->aftermarket()`
- `$client->agreements()`
- `$client->ans()`
- `$client->auctions()`
- `$client->certificates()`
- `$client->countries()`
- `$client->domains()`
- `$client->orders()`
- `$client->parking()`
- `$client->shoppers()`
- `$client->subscriptions()`

## Usage

The smaller services expose explicit methods.

```php
$countries = $client->countries()->getCountries('en-US');
$ticket = $client->abuse()->getTicketInfo('abc123');
```

The larger `CertificatesService` and `DomainsService` use declared operations handled by `__call()`. Call the method names exactly as listed in each service's `OPERATIONS` constant.

```php
$availability = $client->domains()->available('example.com');

$certificate = $client->certificates()->certificate_get('12345');
$created = $client->certificates()->certificate_create(null, [
    'commonName' => 'example.com',
]);
```

Request payloads are associative arrays matching the Swagger schema for the target endpoint.

```php
$client->shoppers()->createSubaccount([
    'email' => 'user@example.com',
    'nameFirst' => 'Ada',
    'nameLast' => 'Lovelace',
]);
```

## Error Handling

Non-2xx responses throw typed exceptions:

- `ValidationException` for `400`
- `UnauthorizedException` for `401` and `403`
- `NotFoundException` for `404`
- `RateLimitException` for `429`
- `ServerException` for `5xx`

All extend `ApiException`, which exposes status code, response body, headers, request method, request URL, and request ID when present.

```php
use ZPMLabs\GoDaddy\Exception\ApiException;

try {
    $client->orders()->get('order-id', 'app-key');
} catch (ApiException $exception) {
    echo $exception->getStatusCode();
}
```

## Configuration

- `baseUrl`: override the default service base URL
- `timeout`: HTTP timeout in seconds
- `maxRetries`: retry count for `408`, `429`, `500`, `502`, `503`, `504`
- `retryDelayMs`: base delay before exponential backoff with jitter
- `defaultHeaders`: headers added to every request
- `userAgent`: user agent sent on every request

## Pagination

Pagination parameters from the Swagger specs stay explicit on each method. Pass `limit`, `offset`, `page`, `pageSize`, `marker`, or similar values directly to the method that exposes them.

## Tests

Run the full suite with:

```bash
composer test
```

The test suite validates:

- query string encoding
- exception mapping
- request construction for every declared operation across all services
