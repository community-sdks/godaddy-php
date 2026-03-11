<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainUsageResponse
{
    public function __construct(
        public string $month,
        public int $domainsUnderManagement,
        public int $domainAdds,
        public int $domainTransfersIn
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('', 0, 0, 0);
        }

        return new self(
            month: (string) ($data['month'] ?? ''),
            domainsUnderManagement: (int) ($data['domainsUnderManagement'] ?? 0),
            domainAdds: (int) ($data['domainAdds'] ?? 0),
            domainTransfersIn: (int) ($data['domainTransfersIn'] ?? 0)
        );
    }
}
