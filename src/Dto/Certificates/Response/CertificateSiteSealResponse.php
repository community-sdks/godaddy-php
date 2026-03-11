<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateSiteSealResponse
{
    public function __construct(public string $html)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('');
        }

        return new self((string) ($data['html'] ?? ''));
    }
}
