<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Shoppers\Response;

final readonly class ShopperStatusResponse
{
    public function __construct(
        public string $billingState
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(billingState: (string) ($data['billingState'] ?? ''));
    }
}
