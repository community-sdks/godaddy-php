<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateValidationResponse
{
    /** @param list<CertificateValidationIssueResponse> $issues */
    public function __construct(
        public bool $valid,
        public array $issues = []
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self(false);
        }

        $issues = [];
        foreach (($data['issues'] ?? $data['errors'] ?? []) as $issue) {
            $issues[] = CertificateValidationIssueResponse::fromMixed($issue);
        }

        return new self((bool) ($data['valid'] ?? false), $issues);
    }
}
