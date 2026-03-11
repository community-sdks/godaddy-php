<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Auctions\Request\BidCreateRequest;
use CommunitySDKs\GoDaddy\Dto\Auctions\Request\PlaceBidsRequest;
use CommunitySDKs\GoDaddy\Exception\Auctions\AuctionsRateLimitException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class AuctionsServiceDtoTest extends TestCase
{
    public function test_place_bids_uses_request_dto_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '[{"listingId":200000,"isHighestBidder":true,"bidId":"e8f0a45d-53c6-49e5-a1f2-08b993960e1b","bidAmountUsd":100000000,"status":"SUCCESS"}]'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->auctions()->placeBids(new PlaceBidsRequest(
            customerId: '295e3bc3-b3b9-4d95-aae5-ede41a994d13',
            requestBody: [
                new BidCreateRequest(
                    bidAmountUsd: 100000000,
                    tosAccepted: true,
                    listingId: 200000
                )
            ]
        ));

        self::assertSame('SUCCESS', $response->bids[0]->status);
        self::assertStringContainsString('/v1/customers/295e3bc3-b3b9-4d95-aae5-ede41a994d13/aftermarket/listings/bids', $transport->requests[0]->url);
        self::assertSame(200000, $transport->requests[0]->body[0]['listingId']);
    }

    public function test_429_maps_to_auctions_rate_limit_exception(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(429, ['Content-Type' => 'application/json'], '{"code":"TOO_MANY_REQUESTS","message":"Too many requests"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->auctions()->placeBids(new PlaceBidsRequest(
                customerId: '295e3bc3-b3b9-4d95-aae5-ede41a994d13',
                requestBody: [new BidCreateRequest(100000000, true, 200000)]
            ));
            self::fail('Expected AuctionsRateLimitException was not thrown.');
        } catch (AuctionsRateLimitException $exception) {
            self::assertSame(429, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('TOO_MANY_REQUESTS', $error->code);
        }
    }
}
