<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Agreements\Request;

final readonly class GetAgreementsRequest
{
    /**
     * @param list<string> $keys
     */
    public function __construct(
        public array $keys,
        public ?int $xPrivateLabelId = null,
        public ?string $xMarketId = null
    ) {
    }

    public function toQueryParams(): array
    {
        return ['keys' => $this->keys];
    }

    public function toHeaders(): array
    {
        return [
            'X-Private-Label-Id' => $this->xPrivateLabelId,
            'X-Market-Id' => $this->xMarketId,
        ];
    }
}
