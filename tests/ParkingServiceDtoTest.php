<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Parking\Request\GetParkingMetricsByDomainRequest;
use CommunitySDKs\GoDaddy\Dto\Parking\Request\GetParkingMetricsRequest;
use CommunitySDKs\GoDaddy\Exception\Parking\ParkingUnprocessableEntityException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class ParkingServiceDtoTest extends TestCase
{
    public function test_get_metrics_uses_request_dto_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"currencyId":"USD","metrics":[{"adClickCount":1,"periodPtz":"2026-03-01","revenue":1000000,"visitCount":10}],"pagination":{"total":1}}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->parking()->getMetrics(new GetParkingMetricsRequest(
            customerId: 'MY',
            periodStartPtz: '2026-03-01',
            periodEndPtz: '2026-03-01',
            limit: 20,
            offset: 0,
            xRequestId: 'req-1'
        ));

        self::assertSame('USD', $response->currencyId);
        self::assertSame(1, $response->metrics[0]->adClickCount);
        self::assertSame('req-1', $transport->requests[0]->headers['X-Request-Id']);
    }

    public function test_get_metrics_by_domain_maps_dto_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"currencyId":"USD","metrics":[{"adClickCount":1,"domain":"example.com","revenue":1000000,"visitCount":10,"pageViewCount":15}],"pagination":{"total":1},"startDate":"2026-03-01","endDate":"2026-03-10"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->parking()->getMetricsByDomain(new GetParkingMetricsByDomainRequest(
            customerId: 'MY',
            startDate: '2026-03-01',
            endDate: '2026-03-10',
            domains: ['example.com']
        ));

        self::assertSame('example.com', $response->metrics[0]->domain);
        self::assertSame(['example.com'], $transport->requests[0]->query['domains']);
    }

    public function test_422_maps_to_parking_unprocessable_exception(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(422, ['Content-Type' => 'application/json'], '{"code":"INVALID_DATE","message":"Invalid date format"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->parking()->getMetricsByDomain(new GetParkingMetricsByDomainRequest('MY', 'bad-date', '2026-03-10'));
            self::fail('Expected ParkingUnprocessableEntityException was not thrown.');
        } catch (ParkingUnprocessableEntityException $exception) {
            self::assertSame(422, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('INVALID_DATE', $error->code);
        }
    }
}
