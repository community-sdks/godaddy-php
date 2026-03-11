<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Response;

final readonly class CertificateListResponse
{
    /** @param list<AnsCertificateResponse> $certificates */
    public function __construct(public array $certificates)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $items = [];
        $raw = $data['items'] ?? $data['certificates'] ?? [];
        if (is_array($raw)) {
            foreach ($raw as $item) {
                $items[] = AnsCertificateResponse::fromMixed($item);
            }
        }

        return new self($items);
    }
}
