<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Abuse\Response;

final readonly class AbuseTicketDetailsResponse
{
    /** @param list<AbuseTicketNoteResponse> $notes */
    public function __construct(
        public string $ticketId,
        public ?string $type,
        public ?string $source,
        public ?string $target,
        public ?bool $closed,
        public ?string $createdAt,
        public ?string $closedAt,
        public array $notes = []
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('', null, null, null, null, null, null);
        }

        $notes = [];
        foreach (($data['notes'] ?? []) as $note) {
            $notes[] = AbuseTicketNoteResponse::fromMixed($note);
        }

        return new self(
            ticketId: (string) ($data['ticketId'] ?? ''),
            type: isset($data['type']) ? (string) $data['type'] : null,
            source: isset($data['source']) ? (string) $data['source'] : null,
            target: isset($data['target']) ? (string) $data['target'] : null,
            closed: isset($data['closed']) ? (bool) $data['closed'] : null,
            createdAt: isset($data['createdAt']) ? (string) $data['createdAt'] : null,
            closedAt: isset($data['closedAt']) ? (string) $data['closedAt'] : null,
            notes: $notes
        );
    }
}
