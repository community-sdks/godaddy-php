<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Tests;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionParameter;
use ZPMLabs\GoDaddy\Client;
use ZPMLabs\GoDaddy\Config;
use ZPMLabs\GoDaddy\Http\Response;
use ZPMLabs\GoDaddy\Service\AbuseService;
use ZPMLabs\GoDaddy\Service\AftermarketService;
use ZPMLabs\GoDaddy\Service\AgreementsService;
use ZPMLabs\GoDaddy\Service\AnsService;
use ZPMLabs\GoDaddy\Service\AuctionsService;
use ZPMLabs\GoDaddy\Service\CertificatesService;
use ZPMLabs\GoDaddy\Service\CountriesService;
use ZPMLabs\GoDaddy\Service\DomainsService;
use ZPMLabs\GoDaddy\Service\OrdersService;
use ZPMLabs\GoDaddy\Service\ParkingService;
use ZPMLabs\GoDaddy\Service\ShoppersService;
use ZPMLabs\GoDaddy\Service\SubscriptionsService;
use ZPMLabs\GoDaddy\Tests\Support\TestTransport;

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

    public function test_every_declared_operation_builds_a_request(): void
    {
        $transport = new TestTransport();
        $client = new Client(
            new Config(apiKey: 'key', apiSecret: 'secret', maxRetries: 0),
            $transport
        );

        foreach (self::SERVICES as $serviceClass => $accessor) {
            $service = $client->{$accessor}();

            foreach ($serviceClass::OPERATIONS as $methodName => $operation) {
                $args = isset($operation['params'])
                    ? array_map(fn (array $param): mixed => $this->sampleValue($param['name'], $param['in']), $operation['params'])
                    : $this->buildArgsFromReflection($service, $methodName);

                $transport->push(new Response(200, ['Content-Type' => 'application/json'], '{}'));
                $before = count($transport->requests);
                $service->{$methodName}(...$args);
                $request = $transport->requests[$before];

                self::assertSame($operation['method'], $request->method, $serviceClass . '::' . $methodName);
                self::assertStringNotContainsString('{', $request->url, $serviceClass . '::' . $methodName);
                self::assertSame('sso-key key:secret', $request->headers['Authorization'] ?? null);
            }
        }
    }

    private function sampleValue(string $name, string $location): mixed
    {
        if ($location === 'body') {
            return ['sample' => true];
        }

        $lower = strtolower($name);
        if (str_contains($lower, 'limit') || str_contains($lower, 'offset') || $lower === 'page' || $lower === 'pagesize' || str_contains($lower, 'waitms')) {
            return 1;
        }

        if (str_contains($lower, 'closed') || $lower === 'latest' || str_contains($lower, 'includesubs') || str_contains($lower, 'privacy') || str_contains($lower, 'fortransfer')) {
            return true;
        }

        if (str_starts_with($name, 'X-')) {
            return 'header-value';
        }

        if (str_ends_with($lower, 's') || in_array($lower, ['keys', 'domains', 'statuses', 'statusgroups', 'includes', 'sources', 'tlds', 'types', 'productgroupkeys'], true)) {
            return ['sample'];
        }

        return 'sample';
    }

    private function buildArgsFromReflection(object $service, string $methodName): array
    {
        try {
            $method = new ReflectionMethod($service, $methodName);
        } catch (ReflectionException) {
            return [];
        }

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
}
