<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\GetAgentEventsRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\SearchAgentsRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\SubmitIdentityCsrRequest;
use CommunitySDKs\GoDaddy\Exception\Ans\AnsConflictException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class AnsServiceDtoTest extends TestCase
{
    public function test_search_uses_request_dto_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"agents":[],"hasMore":false,"limit":20,"offset":0,"returnedCount":0,"totalCount":0}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->ans()->search(new SearchAgentsRequest(
            agentDisplayName: 'Sentiment',
            protocol: 'MCP',
            limit: 20,
            offset: 0
        ));

        self::assertSame(0, $response->data['totalCount']);
        self::assertSame('Sentiment', $transport->requests[0]->query['agentDisplayName']);
        self::assertSame('MCP', $transport->requests[0]->query['protocol']);
    }

    public function test_submit_identity_csr_uses_path_and_body_dto(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(202, ['Content-Type' => 'application/json'], '{"csrId":"550e8400-e29b-41d4-a716-446655440000"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->ans()->submitIdentityCsr(new SubmitIdentityCsrRequest(
            agentId: '550e8400-e29b-41d4-a716-446655440000',
            body: ['csrPEM' => '-----BEGIN CERTIFICATE REQUEST-----']
        ));

        self::assertSame('550e8400-e29b-41d4-a716-446655440000', $response->data['csrId']);
        self::assertStringContainsString('/v1/agents/550e8400-e29b-41d4-a716-446655440000/certificates/identity', $transport->requests[0]->url);
        self::assertSame('-----BEGIN CERTIFICATE REQUEST-----', $transport->requests[0]->body['csrPEM']);
    }

    public function test_events_uses_headers_from_request_dto(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"items":[]}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $client->ans()->events(new GetAgentEventsRequest(
            xRequestId: 'rq_123',
            providerId: 'provider_1',
            lastLogId: 'log_9',
            limit: 50
        ));

        self::assertSame('rq_123', $transport->requests[0]->headers['X-Request-Id']);
        self::assertSame('provider_1', $transport->requests[0]->query['providerId']);
        self::assertSame('log_9', $transport->requests[0]->query['lastLogId']);
    }

    public function test_409_maps_to_ans_conflict_exception(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(409, ['Content-Type' => 'application/json'], '{"code":"CONFLICT","message":"already exists","status":"ERROR"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->ans()->register(new \CommunitySDKs\GoDaddy\Dto\Ans\Request\RegisterAgentRequest(['agentDisplayName' => 'x']));
            self::fail('Expected AnsConflictException was not thrown.');
        } catch (AnsConflictException $exception) {
            self::assertSame(409, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('CONFLICT', $error->code);
        }
    }
}
