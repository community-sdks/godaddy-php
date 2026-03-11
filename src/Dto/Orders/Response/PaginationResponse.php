<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Orders\Response;

final readonly class PaginationResponse
{
    public function __construct(
        public ?string $first = null,
        public ?string $last = null,
        public ?string $next = null,
        public ?string $previous = null,
        public ?int $total = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            first: isset($data['first']) ? (string) $data['first'] : null,
            last: isset($data['last']) ? (string) $data['last'] : null,
            next: isset($data['next']) ? (string) $data['next'] : null,
            previous: isset($data['previous']) ? (string) $data['previous'] : null,
            total: isset($data['total']) ? (int) $data['total'] : null
        );
    }
}
