<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Abuse\Response;

final readonly class AbuseTicketListResponse
{
    /**
     * @param list<string> $ticketIds
     */
    public function __construct(
        public array $ticketIds,
        public ?AbusePaginationResponse $pagination = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $ticketIds = [];
        foreach (($data['ticketIds'] ?? []) as $ticketId) {
            if (is_string($ticketId)) {
                $ticketIds[] = $ticketId;
            }
        }

        $pagination = isset($data['pagination']) && is_array($data['pagination'])
            ? AbusePaginationResponse::fromMixed($data['pagination'])
            : null;

        return new self($ticketIds, $pagination);
    }
}
