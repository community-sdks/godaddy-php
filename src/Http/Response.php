<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Http;

final class Response
{
    public function __construct(
        public readonly int $statusCode,
        public readonly array $headers = [],
        public readonly string $body = ''
    ) {
    }
}
