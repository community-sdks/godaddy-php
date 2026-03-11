# Unofficial GoDaddy PHP SDK

## Getting Started

```bash
composer require community-sdks/godaddy-php
```

```php
use CommunitySDKs\\GoDaddy\\Client;
use CommunitySDKs\\GoDaddy\\Config;

$client = new Client(new Config(
    apiKey: 'your-key',
    apiSecret: 'your-secret',
));
```

## Environment Base URLs

The SDK defaults to sandbox (OTE): `https://api.ote-godaddy.com`.

Use production for all services:

```php
$client = new Client(Config::production(
    apiKey: 'your-key',
    apiSecret: 'your-secret'
));
```

Use sandbox explicitly:

```php
$client = new Client(Config::sandbox(
    apiKey: 'your-key',
    apiSecret: 'your-secret'
));
```

Override base URL for specific services (keys: `abuse`, `aftermarket`, `agreements`, `ans`, `auctions`, `certificates`, `countries`, `domains`, `orders`, `parking`, `shoppers`, `subscriptions`):

```php
$client = new Client(new Config(
    apiKey: 'your-key',
    apiSecret: 'your-secret',
    baseUrl: Config::PRODUCTION_BASE_URL,
    serviceBaseUrls: [
        'abuse' => 'https://api.ote-godaddy.com',
    ]
));
```

## Services

- [Abuse](docs/abuse.md): Abuse ticket management endpoints for listing, creating, and retrieving abuse reports.
- [Aftermarket](docs/aftermarket.md): Aftermarket listing endpoints for auction listings, expiry listings, and listing removals.
- [Agreements](docs/agreements.md): Legal agreement lookup endpoints for required agreement keys.
- [Ans](docs/ans.md): Agent Name Service endpoints for agent registration, resolution, certificates, and events.
- [Auctions](docs/auctions.md): Auction bidding endpoints for placing bids on aftermarket listings.
- [Certificates](docs/certificates.md): Certificate lifecycle endpoints for ordering, validation, download, reissue, renewal, revocation, and subscription lookups.
- [Countries](docs/countries.md): Country and market metadata endpoints for country and state lookups.
- [Domains](docs/domains.md): Domain management endpoints for availability, purchase, DNS, transfers, forwarding, notifications, and maintenance data.
- [Orders](docs/orders.md): Order retrieval endpoints for listing orders and loading individual order details.
- [Parking](docs/parking.md): Parking analytics endpoints for aggregate and per-domain parking metrics.
- [Shoppers](docs/shoppers.md): Shopper account endpoints for subaccounts, profile updates, deletion, status, and password changes.
- [Subscriptions](docs/subscriptions.md): Subscription endpoints for listing, product groups, retrieval, cancellation, and updates.