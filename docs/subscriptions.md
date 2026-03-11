# Subscriptions Service

This document covers the Subscriptions service in the GoDaddy PHP SDK.

Client accessor: `$client->subscriptions()`

All methods now use typed request DTOs and typed response DTOs.

## Methods

- `list(ListSubscriptionsRequest $request): SubscriptionListResponse`
- `productGroups(SubscriptionProductGroupsRequest $request): ProductGroupListResponse`
- `cancel(SubscriptionRequest $request): CancelSubscriptionResponse`
- `get(SubscriptionRequest $request): SubscriptionResponse`
- `update(UpdateSubscriptionRequest $request): UpdateSubscriptionResponse`

## Example

```php
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\ListSubscriptionsRequest;

$response = $client->subscriptions()->list(new ListSubscriptionsRequest(
    xAppKey: 'app-key',
    xShopperId: '1234567890',
    includes: ['addons', 'relations'],
    limit: 25,
));

foreach ($response->subscriptions as $subscription) {
    echo $subscription->subscriptionId . PHP_EOL;
}
```

## Exceptions

Subscription endpoints now throw dedicated exceptions in `CommunitySDKs\GoDaddy\Exception\Subscriptions\*`:

- `SubscriptionsBadRequestException`
- `SubscriptionsUnauthorizedException`
- `SubscriptionsForbiddenException`
- `SubscriptionsNotFoundException`
- `SubscriptionsUnprocessableEntityException`
- `SubscriptionsRateLimitException`
- `SubscriptionsServerException`
- `SubscriptionsGatewayTimeoutException`

Each exception extends `SubscriptionsApiException` and exposes `getErrorResponse()`.
