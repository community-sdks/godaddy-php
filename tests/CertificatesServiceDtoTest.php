<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\CreateCertificateRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCertificateSiteSealRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ListCustomerCertificatesRequest;
use CommunitySDKs\GoDaddy\Exception\Certificates\CertificatesConflictException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class CertificatesServiceDtoTest extends TestCase
{
    public function test_create_uses_request_dto_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(202, ['Content-Type' => 'application/json'], '{"certificateId":"abc123"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->certificates()->create(new CreateCertificateRequest(
            certificateCreate: ['csr' => '---CSR---', 'productType' => 'STANDARD_SSL'],
            xMarketId: 'en-US'
        ));

        self::assertSame('abc123', $response->data['certificateId']);
        self::assertSame('en-US', $transport->requests[0]->headers['X-Market-Id']);
    }

    public function test_get_site_seal_uses_query_parameters_from_dto(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"html":"<div>seal</div>"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->certificates()->getSiteSeal(new GetCertificateSiteSealRequest(
            certificateId: 'abc123',
            theme: 'light',
            locale: 'en-US'
        ));

        self::assertSame('<div>seal</div>', $response->data['html']);
        self::assertSame('light', $transport->requests[0]->query['theme']);
        self::assertSame('en-US', $transport->requests[0]->query['locale']);
    }

    public function test_list_customer_certificates_uses_path_and_query_dto(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{"certificates":[],"pagination":{"total":0}}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $client->certificates()->listCustomerCertificates(new ListCustomerCertificatesRequest(
            customerId: '295e3bc3-b3b9-4d95-aae5-ede41a994d13',
            offset: 10,
            limit: 20
        ));

        self::assertStringContainsString('/v2/customers/295e3bc3-b3b9-4d95-aae5-ede41a994d13/certificates', $transport->requests[0]->url);
        self::assertSame(10, $transport->requests[0]->query['offset']);
        self::assertSame(20, $transport->requests[0]->query['limit']);
    }

    public function test_409_maps_to_certificates_conflict_exception(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(409, ['Content-Type' => 'application/json'], '{"code":"CONFLICT","message":"conflict"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->certificates()->create(new CreateCertificateRequest(['csr' => '---CSR---']));
            self::fail('Expected CertificatesConflictException was not thrown.');
        } catch (CertificatesConflictException $exception) {
            self::assertSame(409, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('CONFLICT', $error->code);
        }
    }
}
