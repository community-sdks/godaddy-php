<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

final class AgreementsService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function get(array $keys, ?string $xPrivateLabelId = null, ?string $xMarketId = null): mixed
    {
        return $this->call('GET', '/v1/agreements', queryParams: ['keys' => $keys], headers: ['X-Private-Label-Id' => $xPrivateLabelId, 'X-Market-Id' => $xMarketId]);
    }
}
