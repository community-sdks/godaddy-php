<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\ChangePasswordRequest;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\CreateSubaccountRequest;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\DeleteShopperRequest;
use CommunitySDKs\GoDaddy\Dto\Shoppers\Request\GetShopperRequest;
use CommunitySDKs\GoDaddy\Exception\Shoppers\ShoppersConflictException;
use CommunitySDKs\GoDaddy\Exception\Shoppers\ShoppersPasswordPolicyException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class ShoppersServiceDtoTest extends TestCase
{
    public function test_create_subaccount_returns_typed_response_and_sends_typed_body(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"shopperId":"1234567890","customerId":"cust-1"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->shoppers()->createSubaccount(CreateSubaccountRequest::sample());

        self::assertSame('1234567890', $response->shopperId);
        self::assertSame('cust-1', $response->customerId);
        self::assertIsArray($transport->requests[0]->body);
        self::assertSame('sample@example.com', $transport->requests[0]->body['email']);
    }

    public function test_get_uses_request_dto_for_path_and_query_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"shopperId":"1234567890","nameFirst":"Jane","nameLast":"Doe","email":"jane@example.com","marketId":"en-US","customerId":"cust-1","externalId":42}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->shoppers()->get(new GetShopperRequest('1234567890', ['customerId']));

        self::assertSame('1234567890', $response->shopperId);
        self::assertSame('Jane', $response->nameFirst);
        self::assertSame(['includes' => ['customerId']], $transport->requests[0]->query);
        self::assertStringContainsString('/v1/shoppers/1234567890', $transport->requests[0]->url);
    }

    public function test_delete_maps_conflict_to_shopper_specific_exception_with_typed_payload(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(409, ['Content-Type' => 'application/json'], '{"code":"ACTIVE_SHOPPER","message":"Active shopper cannot be deleted"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->shoppers()->delete(new DeleteShopperRequest('1234567890', '127.0.0.1'));
            self::fail('Expected conflict exception was not thrown.');
        } catch (ShoppersConflictException $exception) {
            self::assertSame(409, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('ACTIVE_SHOPPER', $error->code);
        }
    }

    public function test_change_password_maps_400_to_password_exception_with_password_error_dto(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(400, ['Content-Type' => 'application/json'], '{"type":"error","code":"PW_TOO_SHORT","message":"Password is too short"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->shoppers()->changePassword(new ChangePasswordRequest('1234567890', 'short'));
            self::fail('Expected password policy exception was not thrown.');
        } catch (ShoppersPasswordPolicyException $exception) {
            self::assertSame(400, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('PW_TOO_SHORT', $error->code);
            self::assertSame('error', $error->type);
        }
    }
}
