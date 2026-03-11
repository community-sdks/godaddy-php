<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Orders\Response;

final readonly class OrderSummaryResponse
{
    /**
     * @param list<LineItemSummaryResponse> $items
     */
    public function __construct(
        public string $orderId,
        public string $currency,
        public string $createdAt,
        public OrderSummaryPricingResponse $pricing,
        public array $items,
        public ?string $parentOrderId = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        $items = [];
        foreach (($data['items'] ?? []) as $item) {
            if (is_array($item)) {
                $items[] = LineItemSummaryResponse::fromArray($item);
            }
        }

        return new self(
            orderId: (string) ($data['orderId'] ?? ''),
            currency: (string) ($data['currency'] ?? ''),
            createdAt: (string) ($data['createdAt'] ?? ''),
            pricing: isset($data['pricing']) && is_array($data['pricing']) ? OrderSummaryPricingResponse::fromArray($data['pricing']) : new OrderSummaryPricingResponse('0'),
            items: $items,
            parentOrderId: isset($data['parentOrderId']) ? (string) $data['parentOrderId'] : null
        );
    }
}
