<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainForwardingResponse
{
    public function __construct(
        public string $fqdn,
        public ?string $type = null,
        public ?string $to = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('');
        }

        return new self(
            fqdn: (string) ($data['fqdn'] ?? ''),
            type: isset($data['type']) ? (string) $data['type'] : null,
            to: isset($data['to']) ? (string) $data['to'] : null
        );
    }
}
