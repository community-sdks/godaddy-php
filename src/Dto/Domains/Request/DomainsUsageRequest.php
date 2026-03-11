<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class DomainsUsageRequest
{
    /**
     * @param list<string>|null $includes
     */
    public function __construct(
        public string $yyyymm,
        public ?string $xRequestId = null,
        public ?array $includes = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['yyyymm' => $this->yyyymm];
    }

    public function toQueryParams(): array
    {
        return ['includes' => $this->includes];
    }

    public function toHeaders(): array
    {
        return ['X-Request-Id' => $this->xRequestId];
    }
}
