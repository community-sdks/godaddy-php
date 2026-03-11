<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class CustomerRegisterSchemaRequest
{
    public function __construct(
        public string $customerId,
        public string $tld,
        public ?string $xRequestId = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['customerId' => $this->customerId, 'tld' => $this->tld];
    }

    public function toHeaders(): array
    {
        return ['X-Request-Id' => $this->xRequestId];
    }
}
