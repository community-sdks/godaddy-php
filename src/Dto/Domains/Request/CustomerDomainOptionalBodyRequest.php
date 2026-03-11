<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final class CustomerDomainOptionalBodyRequest extends CustomerDomainRequest
{
    public function __construct(
        string $customerId,
        string $domain,
        ?string $xRequestId = null,
        public readonly ?array $body = null
    ) {
        parent::__construct($customerId, $domain, $xRequestId);
    }
}
