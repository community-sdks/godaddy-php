<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainSuggestionsResponse
{
    /** @param list<string> $domains */
    public function __construct(public array $domains)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self([]);
        }

        $domains = [];
        foreach ($data as $item) {
            if (is_string($item) && $item !== '') {
                $domains[] = $item;
                continue;
            }

            if (is_array($item) && isset($item['domain']) && is_scalar($item['domain'])) {
                $domains[] = (string) $item['domain'];
            }
        }

        return new self($domains);
    }
}
