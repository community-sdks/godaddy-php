<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Agreements\Request\GetAgreementsRequest;
use CommunitySDKs\GoDaddy\Exception\Agreements\AgreementsRateLimitException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class AgreementsServiceDtoTest extends TestCase
{
    public function test_get_uses_request_dto_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '[{"agreementKey":"DNRA","title":"Domain Name Registration Agreement","content":"text"}]'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->agreements()->get(new GetAgreementsRequest(
            keys: ['DNRA'],
            xPrivateLabelId: 1,
            xMarketId: 'en-US'
        ));

        self::assertSame('DNRA', $response->agreements[0]->agreementKey);
        self::assertSame(1, $transport->requests[0]->headers['X-Private-Label-Id']);
        self::assertSame('en-US', $transport->requests[0]->headers['X-Market-Id']);
        self::assertSame(['DNRA'], $transport->requests[0]->query['keys']);
    }

    public function test_429_maps_to_agreements_rate_limit_exception(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(429, ['Content-Type' => 'application/json'], '{"code":"RATE_LIMITED","message":"Too many requests","retryAfterSec":30}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->agreements()->get(new GetAgreementsRequest(['DNRA']));
            self::fail('Expected AgreementsRateLimitException was not thrown.');
        } catch (AgreementsRateLimitException $exception) {
            self::assertSame(429, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('RATE_LIMITED', $error->code);
        }
    }
}
