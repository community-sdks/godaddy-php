<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

final class SubscriptionsService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function list(string $xAppKey, ?string $xShopperId = null, ?string $xMarketId = null, ?array $productGroupKeys = null, ?array $includes = null, ?int $offset = null, ?int $limit = null, ?string $sort = null): mixed
    {
        return $this->call('GET', '/v1/subscriptions', queryParams: compact('productGroupKeys', 'includes', 'offset', 'limit', 'sort'), headers: ['X-App-Key' => $xAppKey, 'X-Shopper-Id' => $xShopperId, 'X-Market-Id' => $xMarketId]);
    }

    public function productGroups(string $xAppKey, ?string $xShopperId = null): mixed
    {
        return $this->call('GET', '/v1/subscriptions/productGroups', headers: ['X-App-Key' => $xAppKey, 'X-Shopper-Id' => $xShopperId]);
    }

    public function cancel(string $subscriptionId, string $xAppKey, ?string $xShopperId = null): mixed
    {
        return $this->call('DELETE', '/v1/subscriptions/{subscriptionId}', pathParams: compact('subscriptionId'), headers: ['X-App-Key' => $xAppKey, 'X-Shopper-Id' => $xShopperId]);
    }

    public function get(string $subscriptionId, string $xAppKey, ?string $xShopperId = null): mixed
    {
        return $this->call('GET', '/v1/subscriptions/{subscriptionId}', pathParams: compact('subscriptionId'), headers: ['X-App-Key' => $xAppKey, 'X-Shopper-Id' => $xShopperId]);
    }

    public function update(string $subscriptionId, string $xAppKey, array $subscription, ?string $xShopperId = null): mixed
    {
        return $this->call('PATCH', '/v1/subscriptions/{subscriptionId}', pathParams: compact('subscriptionId'), headers: ['X-App-Key' => $xAppKey, 'X-Shopper-Id' => $xShopperId], body: $subscription);
    }
}
