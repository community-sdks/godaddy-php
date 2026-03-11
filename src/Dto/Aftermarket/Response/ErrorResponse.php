<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Aftermarket\Response;

final readonly class ErrorResponse
{
    /**
     * @param list<ErrorFieldResponse> $fields
     */
    public function __construct(
        public string $code,
        public ?string $message = null,
        public array $fields = []
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

        return new self(
            code: (string) ($data['code'] ?? ''),
            message: isset($data['message']) ? (string) $data['message'] : null,
            fields: $fields
        );
    }
}
