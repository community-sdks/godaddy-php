<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Subscriptions\Response;

final readonly class SubscriptionProductResponse
{
    public function __construct(
        public int $pfid,
        public string $label,
        public int $renewalPfid,
        public int $renewalPeriod,
        public string $renewalPeriodUnit,
        public string $productGroupKey,
        public bool $supportBillOn,
        public string $namespace
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            pfid: (int) ($data['pfid'] ?? 0),
            label: (string) ($data['label'] ?? ''),
            renewalPfid: (int) ($data['renewalPfid'] ?? 0),
            renewalPeriod: (int) ($data['renewalPeriod'] ?? 0),
            renewalPeriodUnit: (string) ($data['renewalPeriodUnit'] ?? ''),
            productGroupKey: (string) ($data['productGroupKey'] ?? ''),
            supportBillOn: (bool) ($data['supportBillOn'] ?? false),
            namespace: (string) ($data['namespace'] ?? '')
        );
    }
}
