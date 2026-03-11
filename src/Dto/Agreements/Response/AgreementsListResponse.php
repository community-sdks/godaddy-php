<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Agreements\Response;

final readonly class AgreementsListResponse
{
    /**
     * @param list<LegalAgreementResponse> $agreements
     */
    public function __construct(public array $agreements)
    {
    }

    public static function fromArray(array $items): self
    {
        $agreements = [];
        foreach ($items as $item) {
            if (is_array($item)) {
                $agreements[] = LegalAgreementResponse::fromArray($item);
            }
        }

        return new self($agreements);
    }
}
