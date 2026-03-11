<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Auctions\Request;

final readonly class PlaceBidsRequest
{
    /**
     * @param list<BidCreateRequest> $requestBody
     */
    public function __construct(
        public string $customerId,
        public array $requestBody
    ) {
    }

    public function toPathParams(): array
    {
        return ['customerId' => $this->customerId];
    }

    public function toBody(): array
    {
        $items = [];
        foreach ($this->requestBody as $bid) {
            if ($bid instanceof BidCreateRequest) {
                $items[] = $bid->toArray();
            }
        }

        return $items;
    }
}
