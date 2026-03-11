<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Shoppers\Response;

final readonly class ShopperIdResponse
{
    public function __construct(
        public string $shopperId,
        public ?string $customerId = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            shopperId: (string) ($data['shopperId'] ?? ''),
            customerId: isset($data['customerId']) ? (string) $data['customerId'] : null
        );
    }
}
