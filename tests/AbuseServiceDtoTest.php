<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\CreateTicketV2Request;
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\GetTicketInfoRequest;
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\GetTicketsRequest;
use CommunitySDKs\GoDaddy\Exception\Abuse\AbuseUnprocessableEntityException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class AbuseServiceDtoTest extends TestCase
{
    public function test_get_tickets_uses_request_dto_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"ticketIds":["A1"],"pagination":{"total":1}}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->abuse()->getTickets(new GetTicketsRequest(
            type: 'PHISHING',
            closed: false,
            limit: 25,
            offset: 0
        ));

        self::assertSame('A1', $response->ticketIds[0]);
        self::assertSame('PHISHING', $transport->requests[0]->query['type']);
        self::assertSame(25, $transport->requests[0]->query['limit']);
    }

    public function test_get_ticket_info_uses_path_dto(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"ticketId":"A1"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->abuse()->getTicketInfo(new GetTicketInfoRequest('A1'));

        self::assertSame('A1', $response->ticketId);
        self::assertStringContainsString('/v1/abuse/tickets/A1', $transport->requests[0]->url);
    }

    public function test_422_maps_to_abuse_unprocessable_entity_exception(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(422, ['Content-Type' => 'application/json'], '{"code":"INVALID_INPUT","message":"invalid","stack":["trace"]}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->abuse()->createTicketV2(new CreateTicketV2Request(['type' => 'PHISHING', 'source' => 'https://example.com']));
            self::fail('Expected AbuseUnprocessableEntityException was not thrown.');
        } catch (AbuseUnprocessableEntityException $exception) {
            self::assertSame(422, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('INVALID_INPUT', $error->code);
        }
    }
}
