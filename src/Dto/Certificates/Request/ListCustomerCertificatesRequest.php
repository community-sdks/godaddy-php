<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class ListCustomerCertificatesRequest
{
    public function __construct(
        public string $customerId,
        public ?int $offset = null,
        public ?int $limit = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['customerId' => $this->customerId];
    }

    public function toQueryParams(): array
    {
        return [
            'offset' => $this->offset,
            'limit' => $this->limit,
        ];
    }
}
