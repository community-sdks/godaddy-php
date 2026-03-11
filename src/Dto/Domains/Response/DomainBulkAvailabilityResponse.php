<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainBulkAvailabilityResponse
{
    /** @param list<DomainAvailabilityResponse> $domains */
    public function __construct(public array $domains)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $domains = [];
        $source = $data['domains'] ?? $data;
        if (is_array($source)) {
            foreach ($source as $item) {
                $domains[] = DomainAvailabilityResponse::fromMixed($item);
            }
        }

        return new self($domains);
    }
}
