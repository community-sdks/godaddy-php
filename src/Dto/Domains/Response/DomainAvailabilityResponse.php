<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainAvailabilityResponse
{
    public function __construct(
        public string $domain,
        public bool $available,
        public ?int $price = null,
        public ?string $currency = null,
        public ?bool $definitive = null,
        public ?int $period = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('', false);
        }

        return new self(
            domain: (string) ($data['domain'] ?? ''),
            available: (bool) ($data['available'] ?? false),
            price: isset($data['price']) ? (int) $data['price'] : null,
            currency: isset($data['currency']) ? (string) $data['currency'] : null,
            definitive: isset($data['definitive']) ? (bool) $data['definitive'] : null,
            period: isset($data['period']) ? (int) $data['period'] : null
        );
    }
}
