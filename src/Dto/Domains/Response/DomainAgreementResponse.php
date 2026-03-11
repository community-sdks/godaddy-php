<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainAgreementResponse
{
    /** @param list<DomainAgreementItemResponse> $agreements */
    public function __construct(public array $agreements)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $raw = $data['agreements'] ?? [];
        $agreements = [];
        if (is_array($raw)) {
            foreach ($raw as $agreement) {
                $agreements[] = DomainAgreementItemResponse::fromMixed($agreement);
            }
        }

        return new self($agreements);
    }
}
