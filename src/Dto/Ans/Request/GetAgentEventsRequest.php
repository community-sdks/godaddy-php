<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Request;

final readonly class GetAgentEventsRequest
{
    public function __construct(
        public ?string $xRequestId = null,
        public ?string $providerId = null,
        public ?string $lastLogId = null,
        public ?int $limit = null
    ) {
    }

    public function toQueryParams(): array
    {
        return [
            'providerId' => $this->providerId,
            'lastLogId' => $this->lastLogId,
            'limit' => $this->limit,
        ];
    }

    public function toHeaders(): array
    {
        return ['X-Request-Id' => $this->xRequestId];
    }
}
