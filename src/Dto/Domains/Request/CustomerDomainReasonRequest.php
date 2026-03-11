<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final class CustomerDomainReasonRequest extends CustomerDomainRequest
{
    public function __construct(
        string $customerId,
        string $domain,
        ?string $xRequestId = null,
        public readonly ?string $reason = null
    ) {
        parent::__construct($customerId, $domain, $xRequestId);
    }

    public function toQueryParams(): array
    {
        return ['reason' => $this->reason];
    }
}
