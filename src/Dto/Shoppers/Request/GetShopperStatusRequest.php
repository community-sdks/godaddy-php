<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Shoppers\Request;

final readonly class GetShopperStatusRequest
{
    public function __construct(
        public string $shopperId,
        public string $auditClientIp
    ) {
    }

    public function toPathParams(): array
    {
        return ['shopperId' => $this->shopperId];
    }

    public function toQueryParams(): array
    {
        return ['auditClientIp' => $this->auditClientIp];
    }

    public static function sample(): self
    {
        return new self(shopperId: '1234567890', auditClientIp: '127.0.0.1');
    }
}
