<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainOperationResponse
{
    public function __construct(public bool $success)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self(false);
        }

        return new self((bool) ($data['success'] ?? false));
    }
}
