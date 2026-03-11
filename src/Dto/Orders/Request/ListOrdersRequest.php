<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Orders\Request;

final readonly class ListOrdersRequest
{
    public function __construct(
        public string $xAppKey,
        public ?string $periodStart = null,
        public ?string $periodEnd = null,
        public ?string $domain = null,
        public ?int $productGroupId = null,
        public ?int $paymentProfileId = null,
        public ?string $parentOrderId = null,
        public ?int $offset = null,
        public ?int $limit = null,
        public ?string $sort = null,
        public ?string $xShopperId = null
    ) {
    }

    public function toHeaders(): array
    {
        return [
            'X-Shopper-Id' => $this->xShopperId,
            'X-App-Key' => $this->xAppKey,
        ];
    }

    public function toQueryParams(): array
    {
        return [
            'periodStart' => $this->periodStart,
            'periodEnd' => $this->periodEnd,
            'domain' => $this->domain,
            'productGroupId' => $this->productGroupId,
            'paymentProfileId' => $this->paymentProfileId,
            'parentOrderId' => $this->parentOrderId,
            'offset' => $this->offset,
            'limit' => $this->limit,
            'sort' => $this->sort,
        ];
    }
}
