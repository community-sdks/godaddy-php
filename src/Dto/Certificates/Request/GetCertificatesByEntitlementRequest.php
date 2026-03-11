<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class GetCertificatesByEntitlementRequest
{
    public function __construct(
        public string $entitlementId,
        public ?bool $latest = null
    ) {
    }

    public function toQueryParams(): array
    {
        return [
            'entitlementId' => $this->entitlementId,
            'latest' => $this->latest,
        ];
    }
}
