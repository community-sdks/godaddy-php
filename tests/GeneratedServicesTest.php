<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionParameter;
use CommunitySDKs\GoDaddy\Client;
use CommunitySDKs\GoDaddy\Config;
use CommunitySDKs\GoDaddy\Http\Response;
use CommunitySDKs\GoDaddy\Service\AbuseService;
use CommunitySDKs\GoDaddy\Service\AftermarketService;
use CommunitySDKs\GoDaddy\Service\AgreementsService;
use CommunitySDKs\GoDaddy\Service\AnsService;
use CommunitySDKs\GoDaddy\Service\AuctionsService;
use CommunitySDKs\GoDaddy\Service\CertificatesService;
use CommunitySDKs\GoDaddy\Service\CountriesService;
use CommunitySDKs\GoDaddy\Service\DomainsService;
use CommunitySDKs\GoDaddy\Service\OrdersService;
use CommunitySDKs\GoDaddy\Service\ParkingService;
use CommunitySDKs\GoDaddy\Service\ShoppersService;
use CommunitySDKs\GoDaddy\Service\SubscriptionsService;
use CommunitySDKs\GoDaddy\Tests\Support\TestTransport;

final class GeneratedServicesTest extends TestCase
{
    /** @var array<class-string, string> */
    private const SERVICES = [
        AbuseService::class => 'abuse',
        AftermarketService::class => 'aftermarket',
        AgreementsService::class => 'agreements',
        AnsService::class => 'ans',
        AuctionsService::class => 'auctions',
        CertificatesService::class => 'certificates',
        CountriesService::class => 'countries',
        DomainsService::class => 'domains',
        OrdersService::class => 'orders',
        ParkingService::class => 'parking',
        ShoppersService::class => 'shoppers',
        SubscriptionsService::class => 'subscriptions',
    ];

    public function test_every_service_method_builds_a_request(): void
    {
        $transport = new TestTransport();
        $client = new Client(
            new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0),
            $transport
        );

        foreach (self::SERVICES as $serviceClass => $accessor) {
            $service = $client->{$accessor}();

            foreach ($this->publicServiceMethods($serviceClass) as $methodName) {
                $args = $this->buildArgsFromReflection($service, $methodName);

                $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{}'));
                $before = count($transport->requests);
                $service->{$methodName}(...$args);
                $request = $transport->requests[$before];

                self::assertStringNotContainsString('{', $request->url, $serviceClass . '::' . $methodName);
                self::assertSame('sso-key key:secret', $request->headers['Authorization'] ?? null);
            }
        }
    }

    private function buildArgsFromReflection(object $service, string $methodName): array
    {
        $method = new ReflectionMethod($service, $methodName);
        $args = [];
        foreach ($method->getParameters() as $parameter) {
            $args[] = $this->sampleValueFromParameter($parameter);
        }

        return $args;
    }

    private function sampleValueFromParameter(ReflectionParameter $parameter): mixed
    {
        $type = $parameter->getType();
        if (!$type instanceof ReflectionNamedType) {
            return null;
        }

        if (!$type->isBuiltin()) {
            return 'sample';
        }

        return match ($type->getName()) {
            'int' => 1,
            'float' => 1.5,
            'bool' => true,
            'array' => ['sample'],
            default => 'sample',
        };
    }

    /**
     * @return list<string>
     */
    private function publicServiceMethods(string $serviceClass): array
    {
        $methods = [];
        foreach ((new \ReflectionClass($serviceClass))->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() !== $serviceClass) {
                continue;
            }

            if ($method->isConstructor() || str_starts_with($method->getName(), '__')) {
                continue;
            }

            $methods[] = $method->getName();
        }

        return $methods;
    }
}
