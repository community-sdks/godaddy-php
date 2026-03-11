<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainOrderResponse
{
    public function __construct(
        public string $orderId,
        public ?string $status = null,
        public ?string $submittedAt = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('');
        }

        return new self(
            orderId: (string) ($data['orderId'] ?? ''),
            status: isset($data['status']) ? (string) $data['status'] : null,
            submittedAt: isset($data['submittedAt']) ? (string) $data['submittedAt'] : null
        );
    }
}
