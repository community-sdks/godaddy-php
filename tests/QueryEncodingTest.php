<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use ZPMLabs\GoDaddy\ApiClient;

final class QueryEncodingTest extends TestCase
{
    public function test_array_query_values_repeat_the_same_key(): void
    {
        self::assertSame(
            'tags=one&tags=two&enabled=true',
            ApiClient::buildQueryString([
                'tags' => ['one', 'two'],
                'enabled' => true,
                'skip' => null,
            ])
        );
    }
}
