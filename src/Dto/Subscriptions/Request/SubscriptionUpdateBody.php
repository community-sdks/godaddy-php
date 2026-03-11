<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Request;

final readonly class SubscriptionUpdateBody
{
    public function __construct(
        public ?int $paymentProfileId = null,
        public ?bool $renewAuto = null
    ) {
    }

    public function toArray(): array
    {
        return array_filter([
            'paymentProfileId' => $this->paymentProfileId,
            'renewAuto' => $this->renewAuto,
        ], static fn (mixed $value): bool => $value !== null);
    }
}
