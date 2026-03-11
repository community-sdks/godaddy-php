<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Response;

final readonly class SubscriptionResponse
{
    /**
     * @param list<SubscriptionAddonResponse>|null $addons
     */
    public function __construct(
        public string $subscriptionId,
        public string $status,
        public SubscriptionProductResponse $product,
        public string $createdAt,
        public SubscriptionBillingResponse $billing,
        public bool $renewable,
        public bool $upgradeable,
        public bool $priceLocked,
        public bool $renewAuto,
        public ?array $addons = null,
        public ?bool $cancelable = null,
        public ?string $expiresAt = null,
        public ?string $label = null,
        public ?string $launchUrl = null,
        public ?int $paymentProfileId = null,
        public ?SubscriptionRelationsResponse $relations = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        $addons = null;
        if (isset($data['addons']) && is_array($data['addons'])) {
            $addons = [];
            foreach ($data['addons'] as $addon) {
                if (is_array($addon)) {
                    $addons[] = SubscriptionAddonResponse::fromArray($addon);
                }
            }
        }

        $product = isset($data['product']) && is_array($data['product'])
            ? SubscriptionProductResponse::fromArray($data['product'])
            : SubscriptionProductResponse::fromArray([]);

        $billing = isset($data['billing']) && is_array($data['billing'])
            ? SubscriptionBillingResponse::fromArray($data['billing'])
            : SubscriptionBillingResponse::fromArray([]);

        return new self(
            subscriptionId: (string) ($data['subscriptionId'] ?? ''),
            status: (string) ($data['status'] ?? ''),
            product: $product,
            createdAt: (string) ($data['createdAt'] ?? ''),
            billing: $billing,
            renewable: (bool) ($data['renewable'] ?? false),
            upgradeable: (bool) ($data['upgradeable'] ?? false),
            priceLocked: (bool) ($data['priceLocked'] ?? false),
            renewAuto: (bool) ($data['renewAuto'] ?? false),
            addons: $addons,
            cancelable: isset($data['cancelable']) ? (bool) $data['cancelable'] : null,
            expiresAt: isset($data['expiresAt']) ? (string) $data['expiresAt'] : null,
            label: isset($data['label']) ? (string) $data['label'] : null,
            launchUrl: isset($data['launchUrl']) ? (string) $data['launchUrl'] : null,
            paymentProfileId: isset($data['paymentProfileId']) ? (int) $data['paymentProfileId'] : null,
            relations: isset($data['relations']) && is_array($data['relations']) ? SubscriptionRelationsResponse::fromArray($data['relations']) : null
        );
    }
}
