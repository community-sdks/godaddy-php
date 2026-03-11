<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Response;

final readonly class ProductGroupResponse
{
    public function __construct(
        public string $productGroupKey,
        public int $subscriptionCount
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            productGroupKey: (string) ($data['productGroupKey'] ?? ''),
            subscriptionCount: (int) ($data['subscriptionCount'] ?? 0)
        );
    }
}
