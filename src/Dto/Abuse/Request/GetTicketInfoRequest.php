<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Abuse\Request;

final readonly class GetTicketInfoRequest
{
    public function __construct(public string $ticketId)
    {
    }

    public function toPathParams(): array
    {
        return ['ticketId' => $this->ticketId];
    }
}
