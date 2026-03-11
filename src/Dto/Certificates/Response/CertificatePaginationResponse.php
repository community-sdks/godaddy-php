<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificatePaginationResponse
{
    public function __construct(
        public int $total = 0,
        public int $start = 0,
        public int $limit = 0,
        public int $page = 0,
        public int $pageSize = 0
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
            limit: (int) ($data['limit'] ?? 0),
            page: (int) ($data['page'] ?? 0),
            pageSize: (int) ($data['pageSize'] ?? 0)
        );
    }
}
