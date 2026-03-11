<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Abuse\Request;

final readonly class CreateTicketRequest
{
    public function __construct(public array $body)
    {
    }
}
