<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Countries\Request;

final readonly class GetCountryRequest
{
    public function __construct(
        public string $countryKey,
        public string $marketId
    ) {
    }

    public function toPathParams(): array
    {
        return ['countryKey' => $this->countryKey];
    }

    public function toQueryParams(): array
    {
        return ['marketId' => $this->marketId];
    }
}
