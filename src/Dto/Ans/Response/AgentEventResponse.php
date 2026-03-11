<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Response;

final readonly class AgentEventResponse
{
    public function __construct(
        public ?string $eventId = null,
        public ?string $type = null,
        public ?string $createdAt = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            eventId: isset($data['eventId']) ? (string) $data['eventId'] : null,
            type: isset($data['type']) ? (string) $data['type'] : null,
            createdAt: isset($data['createdAt']) ? (string) $data['createdAt'] : null
        );
    }
}
