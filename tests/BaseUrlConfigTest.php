<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\GetTicketsRequest;
use CommunitySDKs\GoDaddy\Dto\Agreements\Request\GetAgreementsRequest;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class BaseUrlConfigTest extends TestCase
{
    public function test_defaults_to_service_sandbox_base_url(): void
    {
        $transport = new TestTransport();
        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $client->abuse()->getTickets(new GetTicketsRequest());

        self::assertStringStartsWith('https://api.ote-godaddy.com/', $transport->requests[0]->url);
    }

    public function test_production_preset_applies_global_production_base_url(): void
    {
        $transport = new TestTransport();
        $client = new Client(Config::production(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $client->abuse()->getTickets(new GetTicketsRequest());

        self::assertStringStartsWith('https://api.godaddy.com/', $transport->requests[0]->url);
    }

    public function test_service_base_url_override_takes_precedence_over_global_base_url(): void
    {
        $transport = new TestTransport();
        $client = new Client(new Config(
            apiKey: 'key',
            apiSecret: 'secret',
            baseUrl: Config::PRODUCTION_BASE_URL,
            serviceBaseUrls: ['abuse' => 'https://abuse.sandbox.example'],
            maxRetries: 0
        ), $transport);

        $client->abuse()->getTickets(new GetTicketsRequest());
        $client->agreements()->get(new GetAgreementsRequest(keys: ['DNRA']));

        self::assertStringStartsWith('https://abuse.sandbox.example/', $transport->requests[0]->url);
        self::assertStringStartsWith('https://api.godaddy.com/', $transport->requests[1]->url);
    }
}
