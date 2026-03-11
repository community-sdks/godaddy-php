<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainMaintenanceListResponse
{
    /** @param list<DomainMaintenanceResponse> $maintenances */
    public function __construct(public array $maintenances)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $maintenances = [];
        foreach ($data as $maintenance) {
            $maintenances[] = DomainMaintenanceResponse::fromMixed($maintenance);
        }

        return new self($maintenances);
    }
}
