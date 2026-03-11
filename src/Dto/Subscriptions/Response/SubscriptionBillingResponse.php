<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Response;

final readonly class SubscriptionBillingResponse
{
    /**
     * @param list<string>|null $pastDueTypes
     */
    public function __construct(
        public string $renewAt,
        public string $status,
        public string $commitment,
        public ?array $pastDueTypes = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            renewAt: (string) ($data['renewAt'] ?? ''),
            status: (string) ($data['status'] ?? ''),
            commitment: (string) ($data['commitment'] ?? ''),
            pastDueTypes: isset($data['pastDueTypes']) && is_array($data['pastDueTypes']) ? array_values(array_map(static fn (mixed $item): string => (string) $item, $data['pastDueTypes'])) : null
        );
    }
}
