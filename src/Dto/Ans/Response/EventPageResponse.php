<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Response;

final readonly class EventPageResponse
{
    /** @param list<AgentEventResponse> $items */
    public function __construct(public array $items)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $items = [];
        foreach (($data['items'] ?? []) as $item) {
            $items[] = AgentEventResponse::fromMixed($item);
        }

        return new self($items);
    }
}
