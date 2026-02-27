<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Service;

final class CountriesService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public const OPERATIONS = [
        'getCountries' => ['method' => 'GET', 'path' => '/v1/countries'],
        'getCountry' => ['method' => 'GET', 'path' => '/v1/countries/{countryKey}'],
    ];

    public function __construct(\ZPMLabs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function getCountries(string $marketId): mixed
    {
        return $this->call('GET', '/v1/countries', queryParams: compact('marketId'));
    }

    public function getCountry(string $countryKey, string $marketId): mixed
    {
        return $this->call('GET', '/v1/countries/{countryKey}', pathParams: compact('countryKey'), queryParams: compact('marketId'));
    }
}
