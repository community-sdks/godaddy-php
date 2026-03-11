<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Auctions\Request;

final readonly class BidCreateRequest
{
    public function __construct(
        public int $bidAmountUsd,
        public bool $tosAccepted,
        public int $listingId
    ) {
    }

    public function toArray(): array
    {
        return [
            'bidAmountUsd' => $this->bidAmountUsd,
            'tosAccepted' => $this->tosAccepted,
            'listingId' => $this->listingId,
        ];
    }
}
