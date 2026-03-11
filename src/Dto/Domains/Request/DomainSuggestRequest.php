<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainSuggestRequest
{
    /**
     * @param list<string>|null $sources
     * @param list<string>|null $tlds
     */
    public function __construct(
        public ?string $xShopperId = null,
        public ?string $query = null,
        public ?string $country = null,
        public ?string $city = null,
        public ?array $sources = null,
        public ?array $tlds = null,
        public ?int $lengthMax = null,
        public ?int $lengthMin = null,
        public ?int $limit = null,
        public ?int $waitMs = null
    ) {
    }

    public function toQueryParams(): array
    {
        return [
            'query' => $this->query,
            'country' => $this->country,
            'city' => $this->city,
            'sources' => $this->sources,
            'tlds' => $this->tlds,
            'lengthMax' => $this->lengthMax,
            'lengthMin' => $this->lengthMin,
            'limit' => $this->limit,
            'waitMs' => $this->waitMs,
        ];
    }

    public function toHeaders(): array
    {
        return ['X-Shopper-Id' => $this->xShopperId];
    }
}
