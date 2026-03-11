<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Abuse\Request;

final readonly class GetTicketInfoV2Request
{
    public function __construct(public string $ticketId)
    {
    }

    public function toPathParams(): array
    {
        return ['ticketId' => $this->ticketId];
    }
}
