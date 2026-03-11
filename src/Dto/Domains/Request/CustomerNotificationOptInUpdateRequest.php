<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class CustomerNotificationOptInUpdateRequest
{
    /**
     * @param list<string> $types
     */
    public function __construct(
        public string $customerId,
        public array $types,
        public ?string $xRequestId = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['customerId' => $this->customerId];
    }

    public function toQueryParams(): array
    {
        return ['types' => $this->types];
    }

    public function toHeaders(): array
    {
        return ['X-Request-Id' => $this->xRequestId];
    }
}
