<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Domains\Response;

final readonly class DomainRecordResponse
{
    public function __construct(
        public string $type,
        public string $name,
        public ?string $data = null,
        public ?int $ttl = null,
        public ?int $priority = null,
        public ?int $port = null,
        public ?int $weight = null,
        public ?string $service = null,
        public ?string $protocol = null
    ) {
    }

    public static function fromMixed(mixed $data): self
    {
        if (!is_array($data)) {
            return new self('', '');
        }

        return new self(
            type: (string) ($data['type'] ?? ''),
            name: (string) ($data['name'] ?? ''),
            data: isset($data['data']) ? (string) $data['data'] : null,
            ttl: isset($data['ttl']) ? (int) $data['ttl'] : null,
            priority: isset($data['priority']) ? (int) $data['priority'] : null,
            port: isset($data['port']) ? (int) $data['port'] : null,
            weight: isset($data['weight']) ? (int) $data['weight'] : null,
            service: isset($data['service']) ? (string) $data['service'] : null,
            protocol: isset($data['protocol']) ? (string) $data['protocol'] : null
        );
    }
}
