<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Request;

final readonly class ListSubscriptionsRequest
{
    /**
     * @param list<string>|null $productGroupKeys
     * @param list<string>|null $includes
     */
    public function __construct(
        public string $xAppKey,
        public ?string $xShopperId = null,
        public ?string $xMarketId = null,
        public ?array $productGroupKeys = null,
        public ?array $includes = null,
        public ?int $offset = null,
        public ?int $limit = null,
        public ?string $sort = null
    ) {
    }

    public function toHeaders(): array
    {
        return [
            'X-App-Key' => $this->xAppKey,
            'X-Shopper-Id' => $this->xShopperId,
            'X-Market-Id' => $this->xMarketId,
        ];
    }

    public function toQueryParams(): array
    {
        return [
            'productGroupKeys' => $this->productGroupKeys,
            'includes' => $this->includes,
            'offset' => $this->offset,
            'limit' => $this->limit,
            'sort' => $this->sort,
        ];
    }
}
