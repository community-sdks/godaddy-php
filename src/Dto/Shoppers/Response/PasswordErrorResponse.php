<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Shoppers\Response;

final readonly class PasswordErrorResponse
{
    public function __construct(
        public string $code,
        public ?string $type = null,
        public ?string $message = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            code: (string) ($data['code'] ?? ''),
            type: isset($data['type']) ? (string) $data['type'] : null,
            message: isset($data['message']) ? (string) $data['message'] : null
        );
    }
}
