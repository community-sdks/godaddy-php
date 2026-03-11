<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Parking\Response;

final readonly class MetricsByDomainResponse
{
    public function __construct(
        public int $adClickCount,
        public string $domain,
        public int $revenue,
        public int $visitCount,
        public int $pageViewCount
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            adClickCount: (int) ($data['adClickCount'] ?? 0),
            domain: (string) ($data['domain'] ?? ''),
            revenue: (int) ($data['revenue'] ?? 0),
            visitCount: (int) ($data['visitCount'] ?? 0),
            pageViewCount: (int) ($data['pageViewCount'] ?? 0)
        );
    }
}
