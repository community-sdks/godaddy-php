<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainTypeNameBodyRequest
{
    public function __construct(
        public string $domain,
        public string $type,
        public string $name,
        public array $body,
        public ?string $xShopperId = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['domain' => $this->domain, 'type' => $this->type, 'name' => $this->name];
    }

    public function toHeaders(): array
    {
        return ['X-Shopper-Id' => $this->xShopperId];
    }
}
