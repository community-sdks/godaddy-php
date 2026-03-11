<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateActionResponse
{
    public function __construct(
        public ?string $certificateId = null,
        public ?string $status = null,
        public ?string $commonName = null,
        public ?string $expires = null
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
            commonName: isset($data['commonName']) ? (string) $data['commonName'] : null,
            expires: isset($data['expires']) ? (string) $data['expires'] : null
        );
    }
}
