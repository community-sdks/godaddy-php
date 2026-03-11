<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateAcmeExternalAccountBindingResponse
{
    public function __construct(
        public ?string $kid = null,
        public ?string $hmacKey = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            kid: isset($data['kid']) ? (string) $data['kid'] : null,
            hmacKey: isset($data['hmacKey']) ? (string) $data['hmacKey'] : null
        );
    }
}
