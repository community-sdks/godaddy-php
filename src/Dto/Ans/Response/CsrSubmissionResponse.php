<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Response;

final readonly class CsrSubmissionResponse
{
    public function __construct(
        public string $csrId
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('');
        }

        return new self((string) ($data['csrId'] ?? ''));
    }
}
