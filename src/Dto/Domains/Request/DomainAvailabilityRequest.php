<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainAvailabilityRequest
{
    public function __construct(
        public string $domain,
        public ?string $checkType = null,
        public ?bool $forTransfer = null
    ) {
    }

    public function toQueryParams(): array
    {
        return [
            'domain' => $this->domain,
            'checkType' => $this->checkType,
            'forTransfer' => $this->forTransfer,
        ];
    }
}
