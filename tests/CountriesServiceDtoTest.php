<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Dto\Countries\Request\GetCountriesRequest;
use CommunitySDKs\GoDaddy\Dto\Countries\Request\GetCountryRequest;
use CommunitySDKs\GoDaddy\Exception\Countries\CountriesNotFoundException;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class CountriesServiceDtoTest extends TestCase
{
    public function test_get_countries_uses_request_dto_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '[{"countryKey":"US","label":"United States","callingCode":"1"}]'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->countries()->getCountries(new GetCountriesRequest('en-US'));

        self::assertSame('US', $response->countries[0]->countryKey);
        self::assertSame('en-US', $transport->requests[0]->query['marketId']);
    }

    public function test_get_country_uses_request_dto_and_returns_typed_response(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(200, ['Content-Type' => 'application/json'], '[{"countryKey":"US","label":"United States","callingCode":"1","states":[{"stateKey":"AZ","label":"Arizona"}]}]'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        $response = $client->countries()->getCountry(new GetCountryRequest('US', 'en-US'));

        self::assertSame('US', $response->countries[0]->countryKey);
        self::assertSame('AZ', $response->countries[0]->states[0]->stateKey);
        self::assertStringContainsString('/v1/countries/US', $transport->requests[0]->url);
    }

    public function test_404_maps_to_countries_not_found_exception(): void
    {
        $transport = new TestTransport();
        $transport->push(new Response(404, ['Content-Type' => 'application/json'], '{"code":"NOT_FOUND","message":"Country not found"}'));

        $client = new Client(new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0), $transport);

        try {
            $client->countries()->getCountry(new GetCountryRequest('ZZ', 'en-US'));
            self::fail('Expected CountriesNotFoundException was not thrown.');
        } catch (CountriesNotFoundException $exception) {
            self::assertSame(404, $exception->getStatusCode());
            $error = $exception->getErrorResponse();
            self::assertNotNull($error);
            self::assertSame('NOT_FOUND', $error->code);
        }
    }
}
