<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainTldResponse
{
    public function __construct(
        public string $tld,
        public ?string $type = null,
        public ?bool $isIdn = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('');
        }

        return new self(
            tld: (string) ($data['tld'] ?? ''),
            type: isset($data['type']) ? (string) $data['type'] : null,
            isIdn: isset($data['isIdn']) ? (bool) $data['isIdn'] : null
        );
    }
}
