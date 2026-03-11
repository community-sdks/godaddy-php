<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateValidationIssueResponse
{
    public function __construct(
        public ?string $code = null,
        public ?string $message = null,
        public ?string $path = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            code: isset($data['code']) ? (string) $data['code'] : null,
            message: isset($data['message']) ? (string) $data['message'] : null,
            path: isset($data['path']) ? (string) $data['path'] : null
        );
    }
}
