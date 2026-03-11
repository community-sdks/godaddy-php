<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Abuse\Response;

final readonly class AbuseTicketNoteResponse
{
    public function __construct(
        public ?string $message = null,
        public ?string $createdAt = null,
        public ?string $author = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            message: isset($data['message']) ? (string) $data['message'] : null,
            createdAt: isset($data['createdAt']) ? (string) $data['createdAt'] : null,
            author: isset($data['author']) ? (string) $data['author'] : null
        );
    }
}
