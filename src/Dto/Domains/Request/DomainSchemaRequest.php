<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainSchemaRequest
{
    public function __construct(public string $tld)
    {
    }

    public function toPathParams(): array
    {
        return ['tld' => $this->tld];
    }
}
