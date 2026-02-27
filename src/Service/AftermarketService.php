<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Service;

final class AftermarketService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\ZPMLabs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function getListings(string $customerId, ?array $domains = null, ?string $listingStatus = null, ?string $transferBefore = null, ?string $transferAfter = null, ?int $limit = null, ?int $offset = null): mixed
    {
        return $this->call('GET', '/v1/customers/{customerId}/auctions/listings', pathParams: compact('customerId'), queryParams: compact('domains', 'listingStatus', 'transferBefore', 'transferAfter', 'limit', 'offset'));
    }

    public function deleteListings(array $domains): mixed
    {
        return $this->call('DELETE', '/v1/aftermarket/listings', queryParams: compact('domains'));
    }

    public function addExpiryListings(array $expiryListings): mixed
    {
        return $this->call('POST', '/v1/aftermarket/listings/expiry', body: $expiryListings);
    }
}
