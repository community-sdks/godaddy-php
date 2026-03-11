<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Aftermarket\Request;

final readonly class AddExpiryListingsRequest
{
    /**
     * @param list<ExpiryListingCreateRequest> $expiryListings
     */
    public function __construct(public array $expiryListings)
    {
    }

    public function toBody(): array
    {
        $items = [];
        foreach ($this->expiryListings as $listing) {
            if ($listing instanceof ExpiryListingCreateRequest) {
                $items[] = $listing->toArray();
            }
        }

        return $items;
    }
}
