<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainContactsValidateRequest
{
    public function __construct(
        public array $body,
        public ?string $xPrivateLabelId = null,
        public ?string $marketId = null
    ) {
    }

    public function toQueryParams(): array
    {
        return ['marketId' => $this->marketId];
    }

    public function toHeaders(): array
    {
        return ['X-Private-Label-Id' => $this->xPrivateLabelId];
    }
}
