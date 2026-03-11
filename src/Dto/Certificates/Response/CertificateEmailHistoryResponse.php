<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateEmailHistoryResponse
{
    /** @param list<CertificateEmailEventResponse> $history */
    public function __construct(public array $history)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $history = [];
        $source = $data['history'] ?? $data['emails'] ?? $data;
        if (is_array($source)) {
            foreach ($source as $event) {
                $history[] = CertificateEmailEventResponse::fromMixed($event);
            }
        }

        return new self($history);
    }
}
