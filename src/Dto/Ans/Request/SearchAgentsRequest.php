<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Request;

final readonly class SearchAgentsRequest
{
    public function __construct(
        public ?string $agentDisplayName = null,
        public ?string $version = null,
        public ?string $agentHost = null,
        public ?string $protocol = null,
        public ?int $limit = null,
        public ?int $offset = null
    ) {
    }

    public function toQueryParams(): array
    {
        return [
            'agentDisplayName' => $this->agentDisplayName,
            'version' => $this->version,
            'agentHost' => $this->agentHost,
            'protocol' => $this->protocol,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }
}
