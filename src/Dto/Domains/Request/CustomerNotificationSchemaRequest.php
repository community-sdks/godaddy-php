<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Request;

final readonly class CustomerNotificationSchemaRequest
{
    public function __construct(
        public string $customerId,
        public string $type,
        public ?string $xRequestId = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['customerId' => $this->customerId, 'type' => $this->type];
    }

    public function toHeaders(): array
    {
        return ['X-Request-Id' => $this->xRequestId];
    }
}
