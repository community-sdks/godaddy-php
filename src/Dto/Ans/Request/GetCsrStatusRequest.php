<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Request;

final readonly class GetCsrStatusRequest
{
    public function __construct(
        public string $agentId,
        public string $csrId
    ) {
    }

    public function toPathParams(): array
    {
        return [
            'agentId' => $this->agentId,
            'csrId' => $this->csrId,
        ];
    }
}
