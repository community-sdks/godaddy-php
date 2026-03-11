<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Request;

final readonly class SubscriptionProductGroupsRequest
{
    public function __construct(
        public string $xAppKey,
        public ?string $xShopperId = null
    ) {
    }

    public function toHeaders(): array
    {
        return [
            'X-App-Key' => $this->xAppKey,
            'X-Shopper-Id' => $this->xShopperId,
        ];
    }
}
