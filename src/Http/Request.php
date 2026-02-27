<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Http;

final class Request
{
    public function __construct(
        public readonly string $method,
        public readonly string $url,
        public readonly array $headers = [],
        public readonly array $query = [],
        public readonly mixed $body = null,
        public readonly bool $multipart = false,
        public readonly float $timeout = 30.0
    ) {
    }

    public function fullUrl(): string
    {
        $query = \CommunitySDKs\GoDaddy\ApiClient::buildQueryString($this->query);

        return $query === '' ? $this->url : $this->url . '?' . $query;
    }
}
