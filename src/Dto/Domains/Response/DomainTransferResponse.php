<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainTransferResponse
{
    public function __construct(
        public string $domain,
        public ?string $transferStatus = null,
        public ?string $updatedAt = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('');
        }

        return new self(
            domain: (string) ($data['domain'] ?? ''),
            transferStatus: isset($data['transferStatus']) ? (string) $data['transferStatus'] : null,
            updatedAt: isset($data['updatedAt']) ? (string) $data['updatedAt'] : null
        );
    }
}
