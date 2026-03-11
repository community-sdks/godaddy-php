<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainAvailabilityBulkRequest
{
    /**
     * @param list<string> $domains
     */
    public function __construct(
        public array $domains,
        public ?string $checkType = null
    ) {
    }

    public function toQueryParams(): array
    {
        return ['checkType' => $this->checkType];
    }

    public function toBody(): array
    {
        return ['domains' => $this->domains];
    }
}
