<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Service;

final class ParkingService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\ZPMLabs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function getMetrics(string $customerId, ?string $periodStartPtz = null, ?string $periodEndPtz = null, ?int $limit = null, ?int $offset = null, ?string $xRequestId = null): mixed
    {
        return $this->call('GET', '/v1/customers/{customerId}/parking/metrics', pathParams: compact('customerId'), queryParams: compact('periodStartPtz', 'periodEndPtz', 'limit', 'offset'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function getMetricsByDomain(string $customerId, string $startDate, string $endDate, ?array $domains = null, ?string $domainLike = null, ?string $portfolioId = null, ?int $limit = null, ?int $offset = null, ?string $xRequestId = null): mixed
    {
        return $this->call('GET', '/v1/customers/{customerId}/parking/metricsByDomain', pathParams: compact('customerId'), queryParams: compact('startDate', 'endDate', 'domains', 'domainLike', 'portfolioId', 'limit', 'offset'), headers: ['X-Request-Id' => $xRequestId]);
    }
}
