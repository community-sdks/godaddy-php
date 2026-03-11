<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Response;

final readonly class ProductGroupListResponse
{
    /**
     * @param list<ProductGroupResponse> $productGroups
     */
    public function __construct(
        public array $productGroups
    ) {
    }

    public static function fromArray(array $items): self
    {
        $groups = [];
        foreach ($items as $item) {
            if (is_array($item)) {
                $groups[] = ProductGroupResponse::fromArray($item);
            }
        }

        return new self($groups);
    }
}
