<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

final class ShoppersService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function createSubaccount(array $subaccount): mixed
    {
        return $this->call('POST', '/v1/shoppers/subaccount', body: $subaccount);
    }

    public function get(string $shopperId, ?array $includes = null): mixed
    {
        return $this->call('GET', '/v1/shoppers/{shopperId}', pathParams: compact('shopperId'), queryParams: compact('includes'));
    }

    public function update(string $shopperId, array $shopper): mixed
    {
        return $this->call('POST', '/v1/shoppers/{shopperId}', pathParams: compact('shopperId'), body: $shopper);
    }

    public function delete(string $shopperId, string $auditClientIp): mixed
    {
        return $this->call('DELETE', '/v1/shoppers/{shopperId}', pathParams: compact('shopperId'), queryParams: compact('auditClientIp'));
    }

    public function getStatus(string $shopperId, string $auditClientIp): mixed
    {
        return $this->call('GET', '/v1/shoppers/{shopperId}/status', pathParams: compact('shopperId'), queryParams: compact('auditClientIp'));
    }

    public function changePassword(string $shopperId, array $secret): mixed
    {
        return $this->call('PUT', '/v1/shoppers/{shopperId}/factors/password', pathParams: compact('shopperId'), body: $secret);
    }
}
