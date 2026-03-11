<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainValidateRequest
{
    public function __construct(public array $body)
    {
    }
}
