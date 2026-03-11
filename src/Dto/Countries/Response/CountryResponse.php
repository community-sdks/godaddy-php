<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Countries\Response;

final readonly class CountryResponse
{
    /**
     * @param list<StateResponse> $states
     */
    public function __construct(
        public ?string $callingCode = null,
        public ?string $countryKey = null,
        public ?string $label = null,
        public array $states = []
    ) {
    }

    public static function fromArray(array $data): self
    {
        $states = [];
        foreach (($data['states'] ?? []) as $state) {
            if (is_array($state)) {
                $states[] = StateResponse::fromArray($state);
            }
        }

        return new self(
            callingCode: isset($data['callingCode']) ? (string) $data['callingCode'] : null,
            countryKey: isset($data['countryKey']) ? (string) $data['countryKey'] : null,
            label: isset($data['label']) ? (string) $data['label'] : null,
            states: $states
        );
    }
}
