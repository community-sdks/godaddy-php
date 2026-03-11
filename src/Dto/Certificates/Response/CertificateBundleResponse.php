<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateBundleResponse
{
    public function __construct(
        public ?string $certificate = null,
        public ?string $privateKey = null,
        public ?string $caBundle = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            certificate: isset($data['certificate']) ? (string) $data['certificate'] : null,
            privateKey: isset($data['privateKey']) ? (string) $data['privateKey'] : null,
            caBundle: isset($data['caBundle']) ? (string) $data['caBundle'] : null
        );
    }
}
