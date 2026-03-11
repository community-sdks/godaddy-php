<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Countries\Response;

final readonly class StateResponse
{
    public function __construct(
        public ?string $label = null,
        public ?string $stateKey = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            label: isset($data['label']) ? (string) $data['label'] : null,
            stateKey: isset($data['stateKey']) ? (string) $data['stateKey'] : null
        );
    }
}
