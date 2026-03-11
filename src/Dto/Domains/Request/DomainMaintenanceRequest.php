<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainMaintenanceRequest
{
    public function __construct(
        public string $maintenanceId,
        public ?string $xRequestId = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['maintenanceId' => $this->maintenanceId];
    }

    public function toHeaders(): array
    {
        return ['X-Request-Id' => $this->xRequestId];
    }
}
