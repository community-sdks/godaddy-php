<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Aftermarket\Response;

final readonly class ListingsResponse
{
    /** @param list<ListingResponse> $listings */
    public function __construct(
        public array $listings,
        public ?ListingPaginationResponse $pagination = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $listings = [];
        foreach (($data['listings'] ?? []) as $listing) {
            $listings[] = ListingResponse::fromMixed($listing);
        }

        $pagination = isset($data['pagination']) && is_array($data['pagination'])
            ? ListingPaginationResponse::fromMixed($data['pagination'])
            : null;

        return new self($listings, $pagination);
    }
}
