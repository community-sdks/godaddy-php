<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Orders\Response;

final readonly class OrderSummaryPricingResponse
{
    public function __construct(public string $total)
    {
    }

    public static function fromArray(array $data): self
    {
        return new self((string) ($data['total'] ?? '0'));
    }
}
