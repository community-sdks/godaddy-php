<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainTypeNameLookupRequest
{
    public function __construct(
        public string $domain,
        public string $type,
        public string $name,
        public ?string $xShopperId = null,
        public ?int $offset = null,
        public ?int $limit = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['domain' => $this->domain, 'type' => $this->type, 'name' => $this->name];
    }

    public function toQueryParams(): array
    {
        return ['offset' => $this->offset, 'limit' => $this->limit];
    }

    public function toHeaders(): array
    {
        return ['X-Shopper-Id' => $this->xShopperId];
    }
}
