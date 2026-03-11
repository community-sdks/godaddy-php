<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Response;

final readonly class AgentSummaryResponse
{
    public function __construct(
        public ?string $agentId = null,
        public ?string $displayName = null,
        public ?string $protocol = null,
        public ?string $status = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            agentId: isset($data['agentId']) ? (string) $data['agentId'] : null,
            displayName: isset($data['displayName']) ? (string) $data['displayName'] : null,
            protocol: isset($data['protocol']) ? (string) $data['protocol'] : null,
            status: isset($data['status']) ? (string) $data['status'] : null
        );
    }
}
