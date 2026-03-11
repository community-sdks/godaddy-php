<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainTypeBodyRequest
{
    public function __construct(
        public string $domain,
        public string $type,
        public array $body,
        public ?string $xShopperId = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['domain' => $this->domain, 'type' => $this->type];
    }

    public function toHeaders(): array
    {
        return ['X-Shopper-Id' => $this->xShopperId];
    }
}
