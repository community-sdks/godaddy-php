<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final class CustomerDomainRegistrarRequest extends CustomerDomainRequest
{
    public function __construct(
        string $customerId,
        string $domain,
        public readonly string $registrar,
        ?string $xRequestId = null
    ) {
        parent::__construct($customerId, $domain, $xRequestId);
    }

    public function toQueryParams(): array
    {
        return ['registrar' => $this->registrar];
    }
}
