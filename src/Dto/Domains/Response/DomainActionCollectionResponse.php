<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainActionCollectionResponse
{
    /** @param list<DomainActionResponse> $actions */
    public function __construct(public array $actions)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $actions = [];
        foreach ($data as $action) {
            $actions[] = DomainActionResponse::fromMixed($action);
        }

        return new self($actions);
    }
}
