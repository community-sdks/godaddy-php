<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class CustomerRegisterRequest
{
    public function __construct(
        public string $customerId,
        public array $body,
        public ?string $xRequestId = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['customerId' => $this->customerId];
    }

    public function toHeaders(): array
    {
        return ['X-Request-Id' => $this->xRequestId];
    }
}
