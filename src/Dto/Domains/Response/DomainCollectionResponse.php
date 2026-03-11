<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainCollectionResponse
{
    /** @param list<DomainDetailsResponse> $items */
    public function __construct(public array $items)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $items = [];
        foreach ($data as $item) {
            $items[] = DomainDetailsResponse::fromMixed($item);
        }

        return new self($items);
    }
}
