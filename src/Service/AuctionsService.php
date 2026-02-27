<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Service;

final class AuctionsService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public const OPERATIONS = [
        'placeBids' => ['method' => 'POST', 'path' => '/v1/customers/{customerId}/aftermarket/listings/bids'],
    ];

    public function __construct(\ZPMLabs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function placeBids(string $customerId, array $requestBody): mixed
    {
        return $this->call('POST', '/v1/customers/{customerId}/aftermarket/listings/bids', pathParams: compact('customerId'), body: $requestBody);
    }
}
