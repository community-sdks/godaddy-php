# GoDaddy PHP SDK

## Getting Started

```bash
cd godaddy/godaddy-php
composer install
```

```php
use ZPMLabs\GoDaddy\Client;
use ZPMLabs\GoDaddy\Config;

$client = new Client(new Config(
    apiKey: 'your-key',
    apiSecret: 'your-secret',
));
```

Service-specific endpoint documentation is available in the `docs/` folder.
