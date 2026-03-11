<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainActionResponse
{
    public function __construct(
        public ?string $actionType = null,
        public ?string $status = null,
        public ?string $createdAt = null,
        public ?string $domain = null,
        public ?string $updatedAt = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            actionType: isset($data['actionType']) ? (string) $data['actionType'] : null,
            status: isset($data['status']) ? (string) $data['status'] : null,
            createdAt: isset($data['createdAt']) ? (string) $data['createdAt'] : null,
            domain: isset($data['domain']) ? (string) $data['domain'] : null,
            updatedAt: isset($data['updatedAt']) ? (string) $data['updatedAt'] : null
        );
    }
}
