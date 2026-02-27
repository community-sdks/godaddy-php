<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

final class AnsService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function searchANSName(?string $agentDisplayName = null, ?string $version = null, ?string $agentHost = null, ?string $protocol = null, ?int $limit = null, ?int $offset = null): mixed
    {
        return $this->call('GET', '/v1/agents', queryParams: compact('agentDisplayName', 'version', 'agentHost', 'protocol', 'limit', 'offset'));
    }

    public function registerAgent(array $body): mixed
    {
        return $this->call('POST', '/v1/agents/register', body: $body);
    }

    public function resolveANSName(array $body): mixed
    {
        return $this->call('POST', '/v1/agents/resolution', body: $body);
    }

    public function getAgent(string $agentId): mixed
    {
        return $this->call('GET', '/v1/agents/{agentId}', pathParams: compact('agentId'));
    }

    public function validateRegistration(string $agentId): mixed
    {
        return $this->call('POST', '/v1/agents/{agentId}/verify-acme', pathParams: compact('agentId'));
    }

    public function verifyDnsRecords(string $agentId): mixed
    {
        return $this->call('POST', '/v1/agents/{agentId}/verify-dns', pathParams: compact('agentId'));
    }

    public function getAgentIdentityCertificateByAgentId(string $agentId): mixed
    {
        return $this->call('GET', '/v1/agents/{agentId}/certificates/identity', pathParams: compact('agentId'));
    }

    public function submitAgentIdentityCsrByAgentId(string $agentId, array $body): mixed
    {
        return $this->call('POST', '/v1/agents/{agentId}/certificates/identity', pathParams: compact('agentId'), body: $body);
    }

    public function getAgentServerCertificateByAgentId(string $agentId): mixed
    {
        return $this->call('GET', '/v1/agents/{agentId}/certificates/server', pathParams: compact('agentId'));
    }

    public function submitAgentServerCsrByAgentId(string $agentId, array $body): mixed
    {
        return $this->call('POST', '/v1/agents/{agentId}/certificates/server', pathParams: compact('agentId'), body: $body);
    }

    public function getAgentCsrStatusByAgentId(string $agentId, string $csrId): mixed
    {
        return $this->call('GET', '/v1/agents/{agentId}/csrs/{csrId}/status', pathParams: compact('agentId', 'csrId'));
    }

    public function getAgentEvents(?string $xRequestId = null, ?string $providerId = null, ?string $lastLogId = null, ?int $limit = null): mixed
    {
        return $this->call('GET', '/v1/agents/events', queryParams: compact('providerId', 'lastLogId', 'limit'), headers: ['X-Request-Id' => $xRequestId]);
    }
}
