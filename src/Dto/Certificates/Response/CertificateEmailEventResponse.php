<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateEmailEventResponse
{
    public function __construct(
        public ?string $emailId = null,
        public ?string $emailAddress = null,
        public ?string $status = null,
        public ?string $createdAt = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            emailId: isset($data['emailId']) ? (string) $data['emailId'] : null,
            emailAddress: isset($data['emailAddress']) ? (string) $data['emailAddress'] : null,
            status: isset($data['status']) ? (string) $data['status'] : null,
            createdAt: isset($data['createdAt']) ? (string) $data['createdAt'] : null
        );
    }
}
