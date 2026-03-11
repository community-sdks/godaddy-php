<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Request;

final readonly class RegisterAgentRequest
{
    public function __construct(public array $body)
    {
    }
}
