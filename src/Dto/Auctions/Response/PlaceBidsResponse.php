<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Auctions\Response;

final readonly class PlaceBidsResponse
{
    /**
     * @param list<BidPlacedResponse> $bids
     */
    public function __construct(public array $bids)
    {
    }

    public static function fromArray(array $items): self
    {
        $bids = [];
        foreach ($items as $item) {
            if (is_array($item)) {
                $bids[] = BidPlacedResponse::fromArray($item);
            }
        }

        return new self($bids);
    }
}
