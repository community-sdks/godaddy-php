<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainsAgreementRequest
{
    /**
     * @param list<string> $tlds
     */
    public function __construct(
        public array $tlds,
        public bool $privacy,
        public ?string $xMarketId = null,
        public ?bool $forTransfer = null
    ) {
    }

    public function toQueryParams(): array
    {
        return [
            'tlds' => $this->tlds,
            'privacy' => $this->privacy,
            'forTransfer' => $this->forTransfer,
        ];
    }

    public function toHeaders(): array
    {
        return ['X-Market-Id' => $this->xMarketId];
    }
}
