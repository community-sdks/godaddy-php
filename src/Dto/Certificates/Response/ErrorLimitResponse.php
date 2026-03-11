<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class ErrorLimitResponse
{
    /**
     * @param list<ErrorFieldResponse> $fields
     * @param list<string> $stack
     */
    public function __construct(
        public string $code,
        public int $retryAfterSec,
        public ?string $message = null,
        public array $fields = [],
        public array $stack = []
    ) {
    }

    public static function fromArray(array $data): self
    {
        $fields = [];
        foreach (($data['fields'] ?? []) as $field) {
            if (is_array($field)) {
                $fields[] = ErrorFieldResponse::fromArray($field);
            }
        }

        $stack = [];
        foreach (($data['stack'] ?? []) as $line) {
            $stack[] = (string) $line;
        }

        return new self(
            code: (string) ($data['code'] ?? ''),
            retryAfterSec: (int) ($data['retryAfterSec'] ?? 0),
            message: isset($data['message']) ? (string) $data['message'] : null,
            fields: $fields,
            stack: $stack
        );
    }
}
