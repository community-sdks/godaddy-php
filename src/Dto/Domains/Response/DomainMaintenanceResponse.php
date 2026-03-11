<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainMaintenanceResponse
{
    public function __construct(
        public string $maintenanceId,
        public ?string $status = null,
        public ?string $startsAt = null,
        public ?string $endsAt = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('');
        }

        return new self(
            maintenanceId: (string) ($data['maintenanceId'] ?? ''),
            status: isset($data['status']) ? (string) $data['status'] : null,
            startsAt: isset($data['startsAt']) ? (string) $data['startsAt'] : null,
            endsAt: isset($data['endsAt']) ? (string) $data['endsAt'] : null
        );
    }
}
