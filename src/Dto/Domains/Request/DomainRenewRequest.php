<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainRenewRequest
{
    public function __construct(
        public string $domain,
        public ?string $xShopperId = null,
        public ?array $body = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['domain' => $this->domain];
    }

    public function toHeaders(): array
    {
        return ['X-Shopper-Id' => $this->xShopperId];
    }
}
