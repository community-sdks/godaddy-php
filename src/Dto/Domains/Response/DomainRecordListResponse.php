<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainRecordListResponse
{
    /** @param list<DomainRecordResponse> $records */
    public function __construct(public array $records)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $records = [];
        foreach ($data as $record) {
            $records[] = DomainRecordResponse::fromMixed($record);
        }

        return new self($records);
    }
}
