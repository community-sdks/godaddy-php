<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Shoppers\Request;

final readonly class UpdateShopperRequest
{
    public function __construct(
        public string $shopperId,
        public ?string $email = null,
        public ?int $externalId = null,
        public ?string $marketId = null,
        public ?string $nameFirst = null,
        public ?string $nameLast = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['shopperId' => $this->shopperId];
    }

    public function toBody(): array
    {
        return array_filter([
            'email' => $this->email,
            'externalId' => $this->externalId,
            'marketId' => $this->marketId,
            'nameFirst' => $this->nameFirst,
            'nameLast' => $this->nameLast,
        ], static fn (mixed $value): bool => $value !== null);
    }

    public static function sample(): self
    {
        return new self(
            shopperId: '1234567890',
            email: 'updated@example.com',
            externalId: 9876,
            marketId: 'en-US',
            nameFirst: 'Updated',
            nameLast: 'Shopper'
        );
    }
}
