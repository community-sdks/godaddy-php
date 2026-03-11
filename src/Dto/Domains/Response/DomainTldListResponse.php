<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainTldListResponse
{
    /** @param list<DomainTldResponse> $tlds */
    public function __construct(public array $tlds)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $tlds = [];
        foreach ($data as $item) {
            $tlds[] = DomainTldResponse::fromMixed($item);
        }

        return new self($tlds);
    }
}
