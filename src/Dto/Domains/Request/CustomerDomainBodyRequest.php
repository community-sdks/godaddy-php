<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final class CustomerDomainBodyRequest extends CustomerDomainRequest
{
    public function __construct(
        string $customerId,
        string $domain,
        public readonly array $body,
        ?string $xRequestId = null
    ) {
        parent::__construct($customerId, $domain, $xRequestId);
    }
}
