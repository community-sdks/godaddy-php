<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Response;

final readonly class SubscriptionAddonResponse
{
    public function __construct(
        public int $pfid,
        public string $commitment,
        public int $quantity
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            pfid: (int) ($data['pfid'] ?? 0),
            commitment: (string) ($data['commitment'] ?? ''),
            quantity: (int) ($data['quantity'] ?? 0)
        );
    }
}
