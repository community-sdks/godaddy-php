<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Aftermarket\Response;

final readonly class ListingActionResponse
{
    public function __construct(
        public int $listingActionId
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self(0);
        }

        return new self((int) ($data['listingActionId'] ?? 0));
    }
}
