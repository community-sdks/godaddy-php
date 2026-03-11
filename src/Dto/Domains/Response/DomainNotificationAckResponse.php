<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainNotificationAckResponse
{
    public function __construct(
        public string $notificationId,
        public bool $acknowledged,
        public ?string $acknowledgedAt = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('', false);
        }

        return new self(
            notificationId: (string) ($data['notificationId'] ?? ''),
            acknowledged: (bool) ($data['acknowledged'] ?? false),
            acknowledgedAt: isset($data['acknowledgedAt']) ? (string) $data['acknowledgedAt'] : null
        );
    }
}
