<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final class CustomerDomainIncludesRequest extends CustomerDomainRequest
{
    /**
     * @param list<string>|null $includes
     */
    public function __construct(
        string $customerId,
        string $domain,
        ?string $xRequestId = null,
        public readonly ?array $includes = null
    ) {
        parent::__construct($customerId, $domain, $xRequestId);
    }

    public function toQueryParams(): array
    {
        return ['includes' => $this->includes];
    }
}
