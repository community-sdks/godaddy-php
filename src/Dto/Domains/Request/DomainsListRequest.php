<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainsListRequest
{
    /**
     * @param list<string>|null $statuses
     * @param list<string>|null $statusGroups
     * @param list<string>|null $includes
     */
    public function __construct(
        public ?string $xShopperId = null,
        public ?array $statuses = null,
        public ?array $statusGroups = null,
        public ?int $limit = null,
        public ?string $marker = null,
        public ?array $includes = null,
        public ?string $modifiedDate = null
    ) {
    }

    public function toQueryParams(): array
    {
        return [
            'statuses' => $this->statuses,
            'statusGroups' => $this->statusGroups,
            'limit' => $this->limit,
            'marker' => $this->marker,
            'includes' => $this->includes,
            'modifiedDate' => $this->modifiedDate,
        ];
    }

    public function toHeaders(): array
    {
        return ['X-Shopper-Id' => $this->xShopperId];
    }
}
