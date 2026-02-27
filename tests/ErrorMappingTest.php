<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use ZPMLabs\GoDaddy\ApiClient;
use ZPMLabs\GoDaddy\Config;
use ZPMLabs\GoDaddy\Exception\NotFoundException;
use ZPMLabs\GoDaddy\Exception\RateLimitException;
use ZPMLabs\GoDaddy\Exception\ServerException;
use ZPMLabs\GoDaddy\Exception\UnauthorizedException;
use ZPMLabs\GoDaddy\Exception\ValidationException;
use ZPMLabs\GoDaddy\Http\Response;
use ZPMLabs\GoDaddy\Tests\Support\TestTransport;

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
