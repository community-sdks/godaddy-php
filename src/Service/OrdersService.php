<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Service;

final class OrdersService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\ZPMLabs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function list(string $xAppKey, ?string $periodStart = null, ?string $periodEnd = null, ?string $domain = null, ?string $productGroupId = null, ?string $paymentProfileId = null, ?string $parentOrderId = null, ?int $offset = null, ?int $limit = null, ?string $sort = null, ?string $xShopperId = null): mixed
    {
        return $this->call('GET', '/v1/orders', queryParams: compact('periodStart', 'periodEnd', 'domain', 'productGroupId', 'paymentProfileId', 'parentOrderId', 'offset', 'limit', 'sort'), headers: ['X-Shopper-Id' => $xShopperId, 'X-App-Key' => $xAppKey]);
    }

    public function get(string $orderId, string $xAppKey, ?string $xShopperId = null, ?string $xMarketId = null): mixed
    {
        return $this->call('GET', '/v1/orders/{orderId}', pathParams: compact('orderId'), headers: ['X-Shopper-Id' => $xShopperId, 'X-Market-Id' => $xMarketId, 'X-App-Key' => $xAppKey]);
    }
}
