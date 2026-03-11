<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Orders\Response;

final readonly class OrderResponse
{
    public function __construct(public array $data)
    {
    }

    public static function fromArray(array $data): self
    {
        return new self($data);
    }
}
