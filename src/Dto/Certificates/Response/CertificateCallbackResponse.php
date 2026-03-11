<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateCallbackResponse
{
    public function __construct(
        public ?string $callbackUrl = null,
        public ?bool $enabled = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            callbackUrl: isset($data['callbackUrl']) ? (string) $data['callbackUrl'] : (isset($data['url']) ? (string) $data['url'] : null),
            enabled: isset($data['enabled']) ? (bool) $data['enabled'] : null
        );
    }
}
