<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Shoppers\Request;

final readonly class ChangePasswordRequest
{
    public function __construct(
        public string $shopperId,
        public string $secret
    ) {
    }

    public function toPathParams(): array
    {
        return ['shopperId' => $this->shopperId];
    }

    public function toBody(): array
    {
        return ['secret' => $this->secret];
    }

    public static function sample(): self
    {
        return new self(shopperId: '1234567890', secret: 'P@55w0rd+');
    }
}
