<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Request;

final class UpdateSubscriptionRequest extends SubscriptionRequest
{
    public function __construct(
        string $subscriptionId,
        string $xAppKey,
        public readonly SubscriptionUpdateBody $subscription,
        ?string $xShopperId = null
    ) {
        parent::__construct($subscriptionId, $xAppKey, $xShopperId);
    }
}
