<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Request;

final readonly class GetIdentityCertificatesRequest
{
    public function __construct(public string $agentId)
    {
    }

    public function toPathParams(): array
    {
        return ['agentId' => $this->agentId];
    }
}
