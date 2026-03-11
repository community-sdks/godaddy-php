<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Response;

final readonly class AgentDetailsResponse
{
    /** @param list<AgentEndpointResponse> $endpoints */
    public function __construct(
        public string $agentId,
        public ?string $status = null,
        public ?string $displayName = null,
        public array $endpoints = []
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('');
        }

        $endpoints = [];
        foreach (($data['endpoints'] ?? []) as $endpoint) {
            $endpoints[] = AgentEndpointResponse::fromMixed($endpoint);
        }

        return new self(
            agentId: (string) ($data['agentId'] ?? ''),
            status: isset($data['status']) ? (string) $data['status'] : null,
            displayName: isset($data['displayName']) ? (string) $data['displayName'] : null,
            endpoints: $endpoints
        );
    }
}
