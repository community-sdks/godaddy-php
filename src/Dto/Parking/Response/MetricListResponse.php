<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Parking\Response;

final readonly class MetricListResponse
{
    /**
     * @param list<MetricsResponse> $metrics
     */
    public function __construct(
        public string $currencyId,
        public array $metrics,
        public PaginationResponse $pagination
    ) {
    }

    public static function fromArray(array $data): self
    {
        $metrics = [];
        foreach (($data['metrics'] ?? []) as $metric) {
            if (is_array($metric)) {
                $metrics[] = MetricsResponse::fromArray($metric);
            }
        }

        $pagination = isset($data['pagination']) && is_array($data['pagination'])
            ? PaginationResponse::fromArray($data['pagination'])
            : PaginationResponse::fromArray([]);

        return new self(
            currencyId: (string) ($data['currencyId'] ?? ''),
            metrics: $metrics,
            pagination: $pagination
        );
    }
}
