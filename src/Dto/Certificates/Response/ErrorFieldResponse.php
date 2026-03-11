<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class ErrorFieldResponse
{
    public function __construct(
        public string $path,
        public string $code,
        public ?string $message = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            path: (string) ($data['path'] ?? ''),
            code: (string) ($data['code'] ?? ''),
            message: isset($data['message']) ? (string) $data['message'] : null
        );
    }
}
