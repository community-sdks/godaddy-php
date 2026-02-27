<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\ApiClient;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Exception\NotFoundException;
use CommunitySDKs\GoDaddy\Exception\RateLimitException;
use CommunitySDKs\GoDaddy\Exception\ServerException;
use CommunitySDKs\GoDaddy\Exception\UnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\ValidationException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class ErrorMappingTest extends TestCase
{
    public static function statusProvider(): array
    {
        return [
            [400, ValidationException::class],
            [401, UnauthorizedException::class],
            [404, NotFoundException::class],
            [429, RateLimitException::class],
            [500, ServerException::class],
        ];
    }

    #[DataProvider('statusProvider')]
    public function test_status_codes_map_to_specific_exceptions(int $status, string $expectedClass): void
    {
        $transport = new TestTransport();
        $transport->push(new Response($status, ['Content-Type' => 'application/json'], '{}'));
        $client = new ApiClient(new Config(maxRetries: 0), $transport);

        $this->expectException($expectedClass);
        $client->request('GET', 'https://example.test', '/path');
    }
}
