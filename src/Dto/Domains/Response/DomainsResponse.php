<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainsResponse
{
    public function __construct(
        public mixed $data
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        return new self($data);
    }
}
