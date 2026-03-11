<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Auctions\Response;

final readonly class BidPlacedResponse
{
    public function __construct(
        public ?int $listingId = null,
        public ?bool $isHighestBidder = null,
        public ?string $bidId = null,
        public ?int $bidAmountUsd = null,
        public ?string $status = null,
        public ?string $failureReason = null,
        public ?string $bidFailureReason = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            listingId: isset($data['listingId']) ? (int) $data['listingId'] : null,
            isHighestBidder: isset($data['isHighestBidder']) ? (bool) $data['isHighestBidder'] : null,
            bidId: isset($data['bidId']) ? (string) $data['bidId'] : null,
            bidAmountUsd: isset($data['bidAmountUsd']) ? (int) $data['bidAmountUsd'] : null,
            status: isset($data['status']) ? (string) $data['status'] : null,
            failureReason: isset($data['failureReason']) ? (string) $data['failureReason'] : null,
            bidFailureReason: isset($data['bidFailureReason']) ? (string) $data['bidFailureReason'] : null
        );
    }
}
