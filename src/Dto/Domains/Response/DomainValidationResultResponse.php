<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainValidationResultResponse
{
    /** @param list<ErrorFieldResponse> $errors */
    public function __construct(
        public bool $valid,
        public array $errors
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self(false, []);
        }

        $errors = [];
        foreach (($data['errors'] ?? []) as $error) {
            if (is_array($error)) {
                $errors[] = ErrorFieldResponse::fromArray($error);
            }
        }

        return new self((bool) ($data['valid'] ?? false), $errors);
    }
}
