<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Aftermarket\Request;

final readonly class ExpiryListingCreateRequest
{
    public function __construct(
        public string $domain,
        public string $expiresAt,
        public int $losingRegistrarId,
        public ?int $pageViewsMonthly = null,
        public ?int $revenueMonthly = null
    ) {
    }

    public function toArray(): array
    {
        return [
            'domain' => $this->domain,
            'expiresAt' => $this->expiresAt,
            'losingRegistrarId' => $this->losingRegistrarId,
            'pageViewsMonthly' => $this->pageViewsMonthly,
            'revenueMonthly' => $this->revenueMonthly,
        ];
    }
}
