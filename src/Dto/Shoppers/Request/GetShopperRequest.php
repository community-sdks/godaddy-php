<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Shoppers\Request;

final readonly class GetShopperRequest
{
    /**
     * @param list<string>|null $includes
     */
    public function __construct(
        public string $shopperId,
        public ?array $includes = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['shopperId' => $this->shopperId];
    }

    public function toQueryParams(): array
    {
        return ['includes' => $this->includes];
    }

    public static function sample(): self
    {
        return new self(shopperId: '1234567890', includes: ['customerId']);
    }
}
