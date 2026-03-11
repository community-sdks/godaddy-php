<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Aftermarket\Request;

final readonly class DeleteListingsRequest
{
    /**
     * @param list<string> $domains
     */
    public function __construct(public array $domains)
    {
    }

    public function toQueryParams(): array
    {
        return ['domains' => $this->domains];
    }
}
