<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Abuse\Response;

final readonly class AbuseTicketIdResponse
{
    public function __construct(
        public string $ticketId
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (is_array($data)) {
            $ticketId = (string) ($data['ticketId'] ?? $data['u_number'] ?? '');
            return new self($ticketId);
        }

        return new self('');
    }
}
