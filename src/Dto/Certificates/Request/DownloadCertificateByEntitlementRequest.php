<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class DownloadCertificateByEntitlementRequest
{
    public function __construct(public string $entitlementId)
    {
    }

    public function toQueryParams(): array
    {
        return ['entitlementId' => $this->entitlementId];
    }
}
