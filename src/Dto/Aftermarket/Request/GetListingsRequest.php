<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Aftermarket\Request;

final readonly class GetListingsRequest
{
    /**
     * @param list<string>|null $domains
     */
    public function __construct(
        public string $customerId,
        public ?array $domains = null,
        public ?string $listingStatus = null,
        public ?string $transferBefore = null,
        public ?string $transferAfter = null,
        public ?int $limit = null,
        public ?int $offset = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['customerId' => $this->customerId];
    }

    public function toQueryParams(): array
    {
        return [
            'domains' => $this->domains,
            'listingStatus' => $this->listingStatus,
            'transferBefore' => $this->transferBefore,
            'transferAfter' => $this->transferAfter,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }
}
