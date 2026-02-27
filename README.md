# Unofficial GoDaddy PHP SDK

## Getting Started

```bash
composer require community-sdks/godaddy-php
```

```php
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;

$client = new Client(new Config(
    apiKey: 'your-key',
    apiSecret: 'your-secret',
));
```

Service-specific endpoint documentation is available in the `docs/` folder.
