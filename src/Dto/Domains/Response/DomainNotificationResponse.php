<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainNotificationResponse
{
    public function __construct(
        public ?string $type = null,
        public ?bool $optedIn = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            type: isset($data['type']) ? (string) $data['type'] : null,
            optedIn: isset($data['optedIn']) ? (bool) $data['optedIn'] : null
        );
    }
}
