<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Response;

final readonly class AgentSearchResponse
{
    /** @param list<AgentSummaryResponse> $agents */
    public function __construct(
        public array $agents,
        public int $totalCount,
        public int $returnedCount,
        public int $limit,
        public int $offset,
        public bool $hasMore
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([], 0, 0, 0, 0, false);
        }

        $agents = [];
        foreach (($data['agents'] ?? []) as $agent) {
            $agents[] = AgentSummaryResponse::fromMixed($agent);
        }

        return new self(
            agents: $agents,
            totalCount: (int) ($data['totalCount'] ?? 0),
            returnedCount: (int) ($data['returnedCount'] ?? 0),
            limit: (int) ($data['limit'] ?? 0),
            offset: (int) ($data['offset'] ?? 0),
            hasMore: (bool) ($data['hasMore'] ?? false)
        );
    }
}
