<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Orders\Request\GetOrderRequest;
use CommunitySDKs\GoDaddy\Dto\Orders\Request\ListOrdersRequest;
use CommunitySDKs\GoDaddy\Exception\Orders\OrdersGatewayTimeoutException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class OrdersServiceDtoTest extends TestCase
{
    public function test_list_uses_request_dto_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"orders":[{"orderId":"123","currency":"USD","createdAt":"2026-01-01T00:00:00Z","pricing":{"total":"1000000"},"items":[{"label":"Domain"}]}],"pagination":{"total":1}}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->orders()->list(new ListOrdersRequest(
            xAppKey: 'app-key',
            limit: 25,
            sort: '-createdAt'
        ));

        self::assertSame(1, $response->pagination->total);
        self::assertSame('123', $response->orders[0]->orderId);
        self::assertSame('app-key', $transport->requests[0]->headers['X-App-Key']);
    }

    public function test_get_uses_request_dto_and_returns_order_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"orderId":"123","currency":"USD","createdAt":"2026-01-01T00:00:00Z","pricing":{"total":1000000},"billTo":{"contact":{"nameFirst":"Jane","nameLast":"Doe","email":"jane@example.com","phone":"+1.4805058800","addressMailing":{"address1":"1 Main St","city":"Tempe","state":"AZ","postalCode":"85281","country":"US"}}},"payments":[],"items":[]}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->orders()->get(new GetOrderRequest('123', 'app-key', xMarketId: 'en-US'));

        self::assertSame('123', $response->data['orderId']);
        self::assertSame('en-US', $transport->requests[0]->headers['X-Market-Id']);
    }

    public function test_504_maps_to_orders_gateway_timeout_exception(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(504, ['Content-Type' => 'application/json'], '{"code":"GATEWAY_TIMEOUT","message":"Gateway timeout"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->orders()->get(new GetOrderRequest('123', 'app-key'));
            self::fail('Expected OrdersGatewayTimeoutException was not thrown.');
        } catch (OrdersGatewayTimeoutException $exception) {
            self::assertSame(504, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('GATEWAY_TIMEOUT', $error->code);
        }
    }
}
