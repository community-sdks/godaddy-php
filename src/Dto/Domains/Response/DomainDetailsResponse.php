<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainDetailsResponse
{
    public function __construct(
        public string $domain,
        public ?string $status = null,
        public ?string $expires = null,
        public ?string $authCode = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('');
        }

        return new self(
            domain: (string) ($data['domain'] ?? ''),
            status: isset($data['status']) ? (string) $data['status'] : null,
            expires: isset($data['expires']) ? (string) $data['expires'] : null,
            authCode: isset($data['authCode']) ? (string) $data['authCode'] : null
        );
    }
}
