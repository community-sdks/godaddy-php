<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Parking\Request;

final readonly class GetParkingMetricsByDomainRequest
{
    /**
     * @param list<string>|null $domains
     */
    public function __construct(
        public string $customerId,
        public string $startDate,
        public string $endDate,
        public ?array $domains = null,
        public ?string $domainLike = null,
        public ?string $portfolioId = null,
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
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'domains' => $this->domains,
            'domainLike' => $this->domainLike,
            'portfolioId' => $this->portfolioId,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }

    public function toHeaders(): array
    {
        return ['X-Request-Id' => $this->xRequestId];
    }
}
