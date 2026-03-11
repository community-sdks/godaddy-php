<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Abuse\Request;

final readonly class GetTicketsV2Request
{
    public function __construct(
        public ?string $type = null,
        public ?bool $closed = null,
        public ?string $sourceDomainOrIp = null,
        public ?string $target = null,
        public ?string $createdStart = null,
        public ?string $createdEnd = null,
        public ?int $limit = null,
        public ?int $offset = null
    ) {
    }

    public function toQueryParams(): array
    {
        return [
            'type' => $this->type,
            'closed' => $this->closed,
            'sourceDomainOrIp' => $this->sourceDomainOrIp,
            'target' => $this->target,
            'createdStart' => $this->createdStart,
            'createdEnd' => $this->createdEnd,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }
}
