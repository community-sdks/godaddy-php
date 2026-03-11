<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

class CustomerDomainRequest
{
    public function __construct(
        public readonly string $customerId,
        public readonly string $domain,
        public readonly ?string $xRequestId = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['customerId' => $this->customerId, 'domain' => $this->domain];
    }

    public function toHeaders(): array
    {
        return ['X-Request-Id' => $this->xRequestId];
    }
}
