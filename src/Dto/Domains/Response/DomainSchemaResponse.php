<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainSchemaResponse
{
    /** @param list<DomainSchemaFieldResponse> $fields */
    public function __construct(public array $fields)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $fields = [];
        foreach (($data['fields'] ?? []) as $field) {
            $fields[] = DomainSchemaFieldResponse::fromMixed($field);
        }

        return new self($fields);
    }
}
