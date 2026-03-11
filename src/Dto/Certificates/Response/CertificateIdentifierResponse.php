<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateIdentifierResponse
{
    public function __construct(
        public string $certificateId,
        public ?string $status = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('');
        }

        return new self(
            certificateId: (string) ($data['certificateId'] ?? ''),
            status: isset($data['status']) ? (string) $data['status'] : null
        );
    }
}
