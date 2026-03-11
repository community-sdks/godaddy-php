<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainNotificationListResponse
{
    /** @param list<DomainNotificationResponse> $notifications */
    public function __construct(public array $notifications)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $notifications = [];
        foreach ($data as $notification) {
            $notifications[] = DomainNotificationResponse::fromMixed($notification);
        }

        return new self($notifications);
    }
}
