<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Response;

final readonly class CsrStatusResponse
{
    public function __construct(
        public string $csrId,
        public ?string $status = null,
        public ?string $updatedAt = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('');
        }

        return new self(
            csrId: (string) ($data['csrId'] ?? ''),
            status: isset($data['status']) ? (string) $data['status'] : null,
            updatedAt: isset($data['updatedAt']) ? (string) $data['updatedAt'] : null
        );
    }
}
