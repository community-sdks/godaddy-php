<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Abuse\Response;

final readonly class AbuseResponse
{
    public function __construct(public mixed $data)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        return new self($data);
    }
}
