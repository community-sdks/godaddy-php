<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Parking\Request;

final readonly class GetParkingMetricsRequest
{
    public function __construct(
        public string $customerId,
        public ?string $periodStartPtz = null,
        public ?string $periodEndPtz = null,
        public ?int $limit = null,
        public ?int $offset = null,
        public ?string $xRequestId = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['customerId' => $this->customerId];
    }

    public function toQueryParams(): array
    {
        return [
            'periodStartPtz' => $this->periodStartPtz,
            'periodEndPtz' => $this->periodEndPtz,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }

    public function toHeaders(): array
    {
        return ['X-Request-Id' => $this->xRequestId];
    }
}
