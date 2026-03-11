<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainAgreementItemResponse
{
    public function __construct(
        public string $agreementKey,
        public ?string $title = null,
        public ?string $url = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('');
        }

        return new self(
            agreementKey: (string) ($data['agreementKey'] ?? ''),
            title: isset($data['title']) ? (string) $data['title'] : null,
            url: isset($data['url']) ? (string) $data['url'] : null
        );
    }
}
