<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Agreements\Response;

final readonly class LegalAgreementResponse
{
    public function __construct(
        public ?string $agreementKey = null,
        public ?string $content = null,
        public ?string $title = null,
        public ?string $url = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            agreementKey: isset($data['agreementKey']) ? (string) $data['agreementKey'] : null,
            content: isset($data['content']) ? (string) $data['content'] : null,
            title: isset($data['title']) ? (string) $data['title'] : null,
            url: isset($data['url']) ? (string) $data['url'] : null
        );
    }
}
