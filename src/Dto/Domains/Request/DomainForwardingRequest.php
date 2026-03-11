<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainForwardingRequest
{
    public function __construct(
        public string $customerId,
        public string $fqdn,
        public ?bool $includeSubs = null,
        public ?array $body = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['customerId' => $this->customerId, 'fqdn' => $this->fqdn];
    }

    public function toQueryParams(): array
    {
        return ['includeSubs' => $this->includeSubs];
    }
}
