<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainSchemaFieldResponse
{
    public function __construct(
        public ?string $path = null,
        public ?string $type = null,
        public ?bool $required = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            path: isset($data['path']) ? (string) $data['path'] : null,
            type: isset($data['type']) ? (string) $data['type'] : null,
            required: isset($data['required']) ? (bool) $data['required'] : null
        );
    }
}
