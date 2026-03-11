<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Parking\Response;

final readonly class MetricByDomainListResponse
{
    /**
     * @param list<MetricsByDomainResponse> $metrics
     */
    public function __construct(
        public string $currencyId,
        public array $metrics,
        public PaginationResponse $pagination,
        public string $startDate,
        public string $endDate
    ) {
    }

    public static function fromArray(array $data): self
    {
        $metrics = [];
        foreach (($data['metrics'] ?? []) as $metric) {
            if (is_array($metric)) {
                $metrics[] = MetricsByDomainResponse::fromArray($metric);
            }
        }

        $pagination = isset($data['pagination']) && is_array($data['pagination'])
            ? PaginationResponse::fromArray($data['pagination'])
            : PaginationResponse::fromArray([]);

        return new self(
            currencyId: (string) ($data['currencyId'] ?? ''),
            metrics: $metrics,
            pagination: $pagination,
            startDate: (string) ($data['startDate'] ?? ''),
            endDate: (string) ($data['endDate'] ?? '')
        );
    }
}
