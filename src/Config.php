<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy;

final class Config
{
    public const SANDBOX_BASE_URL = 'https://api.ote-godaddy.com';
    public const PRODUCTION_BASE_URL = 'https://api.godaddy.com';

    public function __construct(
        public readonly ?string $apiKey = null,
        public readonly ?string $apiSecret = null,
        public readonly ?string $baseUrl = null,
        /** @var array<string, string> */
        public readonly array $serviceBaseUrls = [],
        public readonly float $timeout = 30.0,
        public readonly int $maxRetries = 2,
        public readonly int $retryDelayMs = 200,
        public readonly array $defaultHeaders = [],
        public readonly string $userAgent = 'community-sdks/godaddy-php'
    ) {
    }

    /**
     * Build config pinned to sandbox (OTE) for all services.
     *
     * @param array<string, string> $serviceBaseUrls
     */
    public static function sandbox(
        ?string $apiKey = null,
        ?string $apiSecret = null,
        array $serviceBaseUrls = [],
        float $timeout = 30.0,
        int $maxRetries = 2,
        int $retryDelayMs = 200,
        array $defaultHeaders = [],
        string $userAgent = 'community-sdks/godaddy-php'
    ): self {
        return new self(
            apiKey: $apiKey,
            apiSecret: $apiSecret,
            baseUrl: self::SANDBOX_BASE_URL,
            serviceBaseUrls: $serviceBaseUrls,
            timeout: $timeout,
            maxRetries: $maxRetries,
            retryDelayMs: $retryDelayMs,
            defaultHeaders: $defaultHeaders,
            userAgent: $userAgent
        );
    }

    /**
     * Build config pinned to production for all services.
     *
     * @param array<string, string> $serviceBaseUrls
     */
    public static function production(
        ?string $apiKey = null,
        ?string $apiSecret = null,
        array $serviceBaseUrls = [],
        float $timeout = 30.0,
        int $maxRetries = 2,
        int $retryDelayMs = 200,
        array $defaultHeaders = [],
        string $userAgent = 'community-sdks/godaddy-php'
    ): self {
        return new self(
            apiKey: $apiKey,
            apiSecret: $apiSecret,
            baseUrl: self::PRODUCTION_BASE_URL,
            serviceBaseUrls: $serviceBaseUrls,
            timeout: $timeout,
            maxRetries: $maxRetries,
            retryDelayMs: $retryDelayMs,
            defaultHeaders: $defaultHeaders,
            userAgent: $userAgent
        );
    }
}
