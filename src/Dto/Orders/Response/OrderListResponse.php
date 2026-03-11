<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Orders\Response;

final readonly class OrderListResponse
{
    /**
     * @param list<OrderSummaryResponse> $orders
     */
    public function __construct(
        public array $orders,
        public PaginationResponse $pagination
    ) {
    }

    public static function fromArray(array $data): self
    {
        $orders = [];
        foreach (($data['orders'] ?? []) as $order) {
            if (is_array($order)) {
                $orders[] = OrderSummaryResponse::fromArray($order);
            }
        }

        $pagination = isset($data['pagination']) && is_array($data['pagination'])
            ? PaginationResponse::fromArray($data['pagination'])
            : PaginationResponse::fromArray([]);

        return new self($orders, $pagination);
    }
}
