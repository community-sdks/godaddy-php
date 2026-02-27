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