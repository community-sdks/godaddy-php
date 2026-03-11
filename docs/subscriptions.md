# Subscriptions Service

Client accessor: `$client->subscriptions()`

## Method Index

- [`list`](#list): `SubscriptionListResponse`
- [`productGroups`](#productgroups): `ProductGroupListResponse`
- [`cancel`](#cancel): `CancelSubscriptionResponse`
- [`get`](#get): `SubscriptionResponse`
- [`update`](#update): `UpdateSubscriptionResponse`

## Methods

### list

Returns: `SubscriptionListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\ListSubscriptionsRequest;

$response = $client->subscriptions()->list(new ListSubscriptionsRequest(
    xAppKey: 'app_abc123'
));
```

Response JSON example:

```json
{
  "subscriptions": [
    {
      "subscriptionId": "sub_123456",
      "status": "ACTIVE",
      "renewAuto": true
    }
  ],
  "pagination": {
    "total": 1,
    "next": null
  }
}
```

### productGroups

Returns: `ProductGroupListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\SubscriptionProductGroupsRequest;

$response = $client->subscriptions()->productGroups(new SubscriptionProductGroupsRequest(
    xAppKey: 'app_abc123'
));
```

Response JSON example:

```json
{
  "productGroups": [
    {
      "productGroupKey": "domains",
      "subscriptionCount": 1
    }
  ]
}
```

### cancel

Returns: `CancelSubscriptionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\SubscriptionRequest;

$response = $client->subscriptions()->cancel(new SubscriptionRequest(
    subscriptionId: 'sub_123456',
    xAppKey: 'app_abc123'
));
```

Response JSON example:

```json
{
  "subscriptionId": "sub_123456",
  "status": "CANCELLED"
}
```

### get

Returns: `SubscriptionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\SubscriptionRequest;

$response = $client->subscriptions()->get(new SubscriptionRequest(
    subscriptionId: 'sub_123456',
    xAppKey: 'app_abc123'
));
```

Response JSON example:

```json
{
  "subscriptionId": "sub_123456",
  "status": "ACTIVE",
  "label": "My Subscription",
  "renewAuto": true
}
```

### update

Returns: `UpdateSubscriptionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\UpdateSubscriptionRequest;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\SubscriptionUpdateBody;

$response = $client->subscriptions()->update(new UpdateSubscriptionRequest(
    subscriptionId: 'sub_123456',
    xAppKey: 'app_abc123',
    subscription: new SubscriptionUpdateBody(paymentProfileId: 445566, renewAuto: true)
));
```

Response JSON example:

```json
{
  "subscriptionId": "sub_123456",
  "status": "ACTIVE"
}
```

## Exceptions

Service-specific exceptions are under `CommunitySDKs\GoDaddy\Exception\Subscriptions\*` and expose `getErrorResponse()`.






