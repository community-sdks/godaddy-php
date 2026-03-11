<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\ListSubscriptionsRequest;
use CommunitySDKs\GoDaddy\Dto\Subscriptions\Request\SubscriptionRequest;
use CommunitySDKs\GoDaddy\Exception\Subscriptions\SubscriptionsGatewayTimeoutException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class SubscriptionsServiceDtoTest extends TestCase
{
    public function test_list_uses_request_dto_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"subscriptions":[],"pagination":{"total":0}}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->subscriptions()->list(new ListSubscriptionsRequest(
            xAppKey: 'app-key',
            xShopperId: '123',
            xMarketId: 'en-US',
            productGroupKeys: ['group-1'],
            includes: ['addons'],
            offset: 0,
            limit: 25,
            sort: '-expiresAt'
        ));

        self::assertSame(0, $response->pagination->total);
        self::assertSame('app-key', $transport->requests[0]->headers['X-App-Key']);
        self::assertSame(['group-1'], $transport->requests[0]->query['productGroupKeys']);
    }

    public function test_get_returns_typed_subscription_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"subscriptionId":"sub-1","status":"ACTIVE","product":{"pfid":1,"label":"Product","renewalPfid":2,"renewalPeriod":1,"renewalPeriodUnit":"YEAR","productGroupKey":"group","supportBillOn":true,"namespace":"domain"},"createdAt":"2026-01-01T00:00:00Z","billing":{"renewAt":"2026-12-01T00:00:00Z","status":"CURRENT","commitment":"PAID"},"renewable":true,"upgradeable":false,"priceLocked":false,"renewAuto":true}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->subscriptions()->get(new SubscriptionRequest('sub-1', 'app-key', '123'));

        self::assertSame('sub-1', $response->subscriptionId);
        self::assertSame('ACTIVE', $response->status);
        self::assertSame('Product', $response->product->label);
    }

    public function test_cancel_maps_504_to_subscriptions_gateway_timeout_exception(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(504, ['Content-Type' => 'application/json'], '{"code":"GATEWAY_TIMEOUT","message":"Gateway timeout"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->subscriptions()->cancel(new SubscriptionRequest('sub-1', 'app-key'));
            self::fail('Expected SubscriptionsGatewayTimeoutException was not thrown.');
        } catch (SubscriptionsGatewayTimeoutException $exception) {
            self::assertSame(504, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('GATEWAY_TIMEOUT', $error->code);
        }
    }
}
