<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Abuse\Response;

final readonly class AbusePaginationResponse
{
    public function __construct(
        public int $total = 0,
        public int $start = 0,
        public int $limit = 0
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            total: (int) ($data['total'] ?? 0),
            start: (int) ($data['start'] ?? 0),
            limit: (int) ($data['limit'] ?? 0)
        );
    }
}
