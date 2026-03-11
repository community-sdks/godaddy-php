<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Ans\Response;

final readonly class AgentEndpointResponse
{
    public function __construct(
        public ?string $url = null,
        public ?string $protocol = null,
        public ?string $status = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self();
        }

        return new self(
            url: isset($data['url']) ? (string) $data['url'] : null,
            protocol: isset($data['protocol']) ? (string) $data['protocol'] : null,
            status: isset($data['status']) ? (string) $data['status'] : null
        );
    }
}
