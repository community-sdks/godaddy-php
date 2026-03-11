<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainsMaintenanceListRequest
{
    public function __construct(
        public ?string $xRequestId = null,
        public ?string $status = null,
        public ?string $modifiedAtAfter = null,
        public ?string $startsAtAfter = null,
        public ?int $limit = null
    ) {
    }

    public function toQueryParams(): array
    {
        return [
            'status' => $this->status,
            'modifiedAtAfter' => $this->modifiedAtAfter,
            'startsAtAfter' => $this->startsAtAfter,
            'limit' => $this->limit,
        ];
    }

    public function toHeaders(): array
    {
        return ['X-Request-Id' => $this->xRequestId];
    }
}
