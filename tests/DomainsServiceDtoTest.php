<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainIncludesRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainsListRequest;
use CommunitySDKs\GoDaddy\Exception\Domains\DomainsConflictException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class DomainsServiceDtoTest extends TestCase
{
    public function test_list_uses_request_dto_and_returns_response_dto(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '[{"domain":"example.com"}]'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->domains()->list(new DomainsListRequest(xShopperId: '123', limit: 1));

        self::assertIsArray($response->items);
        self::assertSame('123', $transport->requests[0]->headers['X-Shopper-Id']);
        self::assertSame(['limit' => 1], $transport->requests[0]->query);
    }

    public function test_domains_v2_methods_are_exposed_with_unique_names(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"domain":"example.com"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->domains()->getCustomerDomain(new CustomerDomainIncludesRequest('cust-1', 'example.com', includes: ['contacts']));

        self::assertSame('example.com', $response->domain);
        self::assertStringContainsString('/v2/customers/cust-1/domains/example.com', $transport->requests[0]->url);
    }

    public function test_domains_conflict_maps_to_domains_specific_exception_with_typed_error(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(409, ['Content-Type' => 'application/json'], '{"code":"DOMAIN_LOCKED","message":"Domain is locked"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->domains()->cancel(new \CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainPathRequest('example.com'));
            self::fail('Expected DomainsConflictException was not thrown.');
        } catch (DomainsConflictException $exception) {
            self::assertSame(409, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('DOMAIN_LOCKED', $error->code);
        }
    }
}
