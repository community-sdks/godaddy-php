<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Response;

final readonly class SubscriptionRelationsResponse
{
    /**
     * @param list<string>|null $children
     */
    public function __construct(
        public ?string $parent = null,
        public ?array $children = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            parent: isset($data['parent']) ? (string) $data['parent'] : null,
            children: isset($data['children']) && is_array($data['children']) ? array_values(array_map(static fn (mixed $item): string => (string) $item, $data['children'])) : null
        );
    }
}
