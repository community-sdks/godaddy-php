<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateCollectionResponse
{
    /** @param list<CertificateSummaryResponse> $certificates */
    public function __construct(
        public array $certificates,
        public ?CertificatePaginationResponse $pagination = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $raw = $data['certificates'] ?? $data['items'] ?? [];
        $certificates = [];
        if (is_array($raw)) {
            foreach ($raw as $certificate) {
                $certificates[] = CertificateSummaryResponse::fromMixed($certificate);
            }
        }

        $pagination = isset($data['pagination']) && is_array($data['pagination'])
            ? CertificatePaginationResponse::fromMixed($data['pagination'])
            : null;

        return new self($certificates, $pagination);
    }
}
