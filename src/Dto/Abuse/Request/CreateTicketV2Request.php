<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Abuse\Request;

final readonly class CreateTicketV2Request
{
    public function __construct(public array $body)
    {
    }
}
