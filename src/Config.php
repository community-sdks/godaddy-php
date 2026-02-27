<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy;

final class Config
{
    public function __construct(
        public readonly ?string $apiKey = null,
        public readonly ?string $apiSecret = null,
        public readonly ?string $baseUrl = null,
        public readonly float $timeout = 30.0,
        public readonly int $maxRetries = 2,
        public readonly int $retryDelayMs = 200,
        public readonly array $defaultHeaders = [],
        public readonly string $userAgent = 'community-sdks/godaddy-php'
    ) {
    }
}
