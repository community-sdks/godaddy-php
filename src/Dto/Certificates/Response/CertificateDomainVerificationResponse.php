<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateDomainVerificationResponse
{
    public function __construct(
        public ?string $domain = null,
        public ?string $method = null,
        public ?string $status = null,
        public ?string $token = null,
        public ?string $value = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            domain: isset($data['domain']) ? (string) $data['domain'] : null,
            method: isset($data['method']) ? (string) $data['method'] : null,
            status: isset($data['status']) ? (string) $data['status'] : null,
            token: isset($data['token']) ? (string) $data['token'] : null,
            value: isset($data['value']) ? (string) $data['value'] : null
        );
    }
}
