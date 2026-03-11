<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Countries\Response;

final readonly class CountriesListResponse
{
    /**
     * @param list<CountrySummaryResponse> $countries
     */
    public function __construct(public array $countries)
    {
    }

    public static function fromArray(array $items): self
    {
        $countries = [];
        foreach ($items as $item) {
            if (is_array($item)) {
                $countries[] = CountrySummaryResponse::fromArray($item);
            }
        }

        return new self($countries);
    }
}
