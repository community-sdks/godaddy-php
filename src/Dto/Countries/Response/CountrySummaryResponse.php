<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Countries\Response;

final readonly class CountrySummaryResponse
{
    public function __construct(
        public ?string $callingCode = null,
        public ?string $countryKey = null,
        public ?string $label = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            callingCode: isset($data['callingCode']) ? (string) $data['callingCode'] : null,
            countryKey: isset($data['countryKey']) ? (string) $data['countryKey'] : null,
            label: isset($data['label']) ? (string) $data['label'] : null
        );
    }
}
