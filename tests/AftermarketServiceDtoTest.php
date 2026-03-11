<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Request\AddExpiryListingsRequest;
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Request\DeleteListingsRequest;
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Request\ExpiryListingCreateRequest;
use CommunitySDKs\GoDaddy\Dto\Aftermarket\Request\GetListingsRequest;
use CommunitySDKs\GoDaddy\Exception\Aftermarket\AftermarketUnprocessableEntityException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class AftermarketServiceDtoTest extends TestCase
{
    public function test_get_listings_uses_request_dto_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"listings":[],"pagination":{"total":0}}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->aftermarket()->getListings(new GetListingsRequest(
            customerId: '295e3bc3-b3b9-4d95-aae5-ede41a994d13',
            domains: ['example.com'],
            listingStatus: 'FULFILLED',
            limit: 10,
            offset: 5
        ));

        self::assertSame(0, $response->pagination?->total);
        self::assertStringContainsString('/v1/customers/295e3bc3-b3b9-4d95-aae5-ede41a994d13/auctions/listings', $transport->requests[0]->url);
        self::assertSame(['example.com'], $transport->requests[0]->query['domains']);
    }

    public function test_delete_and_add_expiry_listings_use_request_dto(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"listingActionId":123}'));
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"listingActionId":456}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $deleteResponse = $client->aftermarket()->deleteListings(new DeleteListingsRequest(['example.com']));
        self::assertSame(123, $deleteResponse->listingActionId);
        self::assertSame(['example.com'], $transport->requests[0]->query['domains']);

        $addResponse = $client->aftermarket()->addExpiryListings(new AddExpiryListingsRequest([
            new ExpiryListingCreateRequest(
                domain: 'example.com',
                expiresAt: '2026-04-01T00:00:00Z',
                losingRegistrarId: 1,
                pageViewsMonthly: 10,
                revenueMonthly: 1000
            )
        ]));

        self::assertSame(456, $addResponse->listingActionId);
        self::assertSame('example.com', $transport->requests[1]->body[0]['domain']);
    }

    public function test_422_maps_to_aftermarket_unprocessable_entity_exception(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(422, ['Content-Type' => 'application/json'], '{"code":"INVALID_INPUT","message":"Invalid listing data"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->aftermarket()->addExpiryListings(new AddExpiryListingsRequest([
                new ExpiryListingCreateRequest('example.com', '2026-04-01T00:00:00Z', 1)
            ]));
            self::fail('Expected AftermarketUnprocessableEntityException was not thrown.');
        } catch (AftermarketUnprocessableEntityException $exception) {
            self::assertSame(422, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('INVALID_INPUT', $error->code);
        }
    }
}
