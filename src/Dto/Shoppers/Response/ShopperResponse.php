<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Shoppers\Response;

final readonly class ShopperResponse
{
    public function __construct(
        public string $shopperId,
        public string $nameFirst,
        public string $nameLast,
        public string $email,
        public string $marketId,
        public ?string $customerId = null,
        public ?int $externalId = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            shopperId: (string) ($data['shopperId'] ?? ''),
            nameFirst: (string) ($data['nameFirst'] ?? ''),
            nameLast: (string) ($data['nameLast'] ?? ''),
            email: (string) ($data['email'] ?? ''),
            marketId: (string) ($data['marketId'] ?? ''),
            customerId: isset($data['customerId']) ? (string) $data['customerId'] : null,
            externalId: isset($data['externalId']) ? (int) $data['externalId'] : null
        );
    }
}
