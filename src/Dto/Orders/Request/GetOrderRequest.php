<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Orders\Request;

final readonly class GetOrderRequest
{
    public function __construct(
        public string $orderId,
        public string $xAppKey,
        public ?string $xShopperId = null,
        public ?string $xMarketId = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['orderId' => $this->orderId];
    }

    public function toHeaders(): array
    {
        return [
            'X-Shopper-Id' => $this->xShopperId,
            'X-Market-Id' => $this->xMarketId,
            'X-App-Key' => $this->xAppKey,
        ];
    }
}
