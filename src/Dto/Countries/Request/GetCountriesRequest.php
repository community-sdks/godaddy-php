<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Countries\Request;

final readonly class GetCountriesRequest
{
    public function __construct(public string $marketId)
    {
    }

    public function toQueryParams(): array
    {
        return ['marketId' => $this->marketId];
    }
}
