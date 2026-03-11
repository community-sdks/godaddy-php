<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Response;

final readonly class AnsCertificateResponse
{
    public function __construct(
        public ?string $certificateId = null,
        public ?string $status = null,
        public ?string $expiresAt = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            certificateId: isset($data['certificateId']) ? (string) $data['certificateId'] : null,
            status: isset($data['status']) ? (string) $data['status'] : null,
            expiresAt: isset($data['expiresAt']) ? (string) $data['expiresAt'] : null
        );
    }
}
