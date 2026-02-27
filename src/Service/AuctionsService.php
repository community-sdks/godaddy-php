<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

final class AuctionsService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function placeBids(string $customerId, array $requestBody): mixed
    {
        return $this->call('POST', '/v1/customers/{customerId}/aftermarket/listings/bids', pathParams: compact('customerId'), body: $requestBody);
    }
}
