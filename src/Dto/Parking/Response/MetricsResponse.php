<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Parking\Response;

final readonly class MetricsResponse
{
    public function __construct(
        public int $adClickCount,
        public string $periodPtz,
        public int $revenue,
        public int $visitCount
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            adClickCount: (int) ($data['adClickCount'] ?? 0),
            periodPtz: (string) ($data['periodPtz'] ?? ''),
            revenue: (int) ($data['revenue'] ?? 0),
            visitCount: (int) ($data['visitCount'] ?? 0)
        );
    }
}
