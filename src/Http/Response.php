<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Http;

final class Response
{
    public function __construct(
        public readonly int $statusCode,
        public readonly array $headers = [],
        public readonly string $body = ''
    ) {
    }
}
