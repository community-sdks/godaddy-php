<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class ListSubscriptionCertificatesRequest
{
    public function __construct(
        public string $guid,
        public ?int $pageSize = null,
        public ?int $page = null,
        public ?string $domain = null,
        public ?string $status = null,
        public ?string $type = null,
        public ?string $validation = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['guid' => $this->guid];
    }

    public function toQueryParams(): array
    {
        return [
            'pageSize' => $this->pageSize,
            'page' => $this->page,
            'domain' => $this->domain,
            'status' => $this->status,
            'type' => $this->type,
            'validation' => $this->validation,
        ];
    }
}
