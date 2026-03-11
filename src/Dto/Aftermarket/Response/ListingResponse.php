<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Aftermarket\Response;

final readonly class ListingResponse
{
    public function __construct(
        public ?string $fqdn = null,
        public ?int $listingId = null,
        public ?string $listingStatus = null,
        public ?int $price = null,
        public ?string $currency = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            fqdn: isset($data['fqdn']) ? (string) $data['fqdn'] : null,
            listingId: isset($data['listingId']) ? (int) $data['listingId'] : null,
            listingStatus: isset($data['listingStatus']) ? (string) $data['listingStatus'] : null,
            price: isset($data['price']) ? (int) $data['price'] : null,
            currency: isset($data['currency']) ? (string) $data['currency'] : null
        );
    }
}
