<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Request;

class SubscriptionRequest
{
    public function __construct(
        public readonly string $subscriptionId,
        public readonly string $xAppKey,
        public readonly ?string $xShopperId = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['subscriptionId' => $this->subscriptionId];
    }

    public function toHeaders(): array
    {
        return [
            'X-App-Key' => $this->xAppKey,
            'X-Shopper-Id' => $this->xShopperId,
        ];
    }
}
