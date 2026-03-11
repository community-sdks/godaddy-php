<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Response;

final readonly class SubscriptionListResponse
{
    /**
     * @param list<SubscriptionResponse> $subscriptions
     */
    public function __construct(
        public array $subscriptions,
        public PaginationResponse $pagination
    ) {
    }

    public static function fromArray(array $data): self
    {
        $subscriptions = [];
        foreach (($data['subscriptions'] ?? []) as $subscription) {
            if (is_array($subscription)) {
                $subscriptions[] = SubscriptionResponse::fromArray($subscription);
            }
        }

        $pagination = isset($data['pagination']) && is_array($data['pagination'])
            ? PaginationResponse::fromArray($data['pagination'])
            : PaginationResponse::fromArray([]);

        return new self($subscriptions, $pagination);
    }
}
