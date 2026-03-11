<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Response;

final readonly class ErrorResponse
{
    public function __construct(
        public string $code,
        public string $message,
        public string $status,
        public ?array $details = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            code: (string) ($data['code'] ?? ''),
            message: (string) ($data['message'] ?? ''),
            status: (string) ($data['status'] ?? ''),
            details: isset($data['details']) && is_array($data['details']) ? $data['details'] : null
        );
    }
}
