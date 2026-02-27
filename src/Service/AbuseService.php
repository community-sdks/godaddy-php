<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Service;

final class AbuseService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public const OPERATIONS = [
        'getTickets' => ['method' => 'GET', 'path' => '/v1/abuse/tickets'],
        'createTicket' => ['method' => 'POST', 'path' => '/v1/abuse/tickets'],
        'getTicketInfo' => ['method' => 'GET', 'path' => '/v1/abuse/tickets/{ticketId}'],
        'getTicketsV2' => ['method' => 'GET', 'path' => '/v2/abuse/tickets'],
        'createTicketV2' => ['method' => 'POST', 'path' => '/v2/abuse/tickets'],
        'getTicketInfoV2' => ['method' => 'GET', 'path' => '/v2/abuse/tickets/{ticketId}'],
    ];

    public function __construct(\ZPMLabs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function getTickets(?string $type = null, ?bool $closed = null, ?string $sourceDomainOrIp = null, ?string $target = null, ?string $createdStart = null, ?string $createdEnd = null, ?int $limit = null, ?int $offset = null): mixed
    {
        return $this->call('GET', '/v1/abuse/tickets', queryParams: compact('type', 'closed', 'sourceDomainOrIp', 'target', 'createdStart', 'createdEnd', 'limit', 'offset'));
    }

    public function createTicket(array $body): mixed
    {
        return $this->call('POST', '/v1/abuse/tickets', body: $body);
    }

    public function getTicketInfo(string $ticketId): mixed
    {
        return $this->call('GET', '/v1/abuse/tickets/{ticketId}', pathParams: compact('ticketId'));
    }

    public function getTicketsV2(?string $type = null, ?bool $closed = null, ?string $sourceDomainOrIp = null, ?string $target = null, ?string $createdStart = null, ?string $createdEnd = null, ?int $limit = null, ?int $offset = null): mixed
    {
        return $this->call('GET', '/v2/abuse/tickets', queryParams: compact('type', 'closed', 'sourceDomainOrIp', 'target', 'createdStart', 'createdEnd', 'limit', 'offset'));
    }

    public function createTicketV2(array $body): mixed
    {
        return $this->call('POST', '/v2/abuse/tickets', body: $body);
    }

    public function getTicketInfoV2(string $ticketId): mixed
    {
        return $this->call('GET', '/v2/abuse/tickets/{ticketId}', pathParams: compact('ticketId'));
    }
}
