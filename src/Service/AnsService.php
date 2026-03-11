<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\Dto\Ans\Request\GetAgentEventsRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\GetAgentRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\GetCsrStatusRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\GetIdentityCertificatesRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\GetServerCertificatesRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\RegisterAgentRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\ResolveAgentRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\RevokeAgentRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\SearchAgentsRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\SubmitIdentityCsrRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\SubmitServerCsrRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\VerifyAcmeRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Request\VerifyDnsRequest;
use CommunitySDKs\GoDaddy\Dto\Ans\Response\AgentDetailsResponse;
use CommunitySDKs\GoDaddy\Dto\Ans\Response\AgentSearchResponse;
use CommunitySDKs\GoDaddy\Dto\Ans\Response\CertificateListResponse;
use CommunitySDKs\GoDaddy\Dto\Ans\Response\CsrStatusResponse;
use CommunitySDKs\GoDaddy\Dto\Ans\Response\CsrSubmissionResponse;
use CommunitySDKs\GoDaddy\Dto\Ans\Response\EventPageResponse;
use CommunitySDKs\GoDaddy\Dto\Ans\Response\ErrorResponse;
use CommunitySDKs\GoDaddy\Exception\Ans\AnsApiException;
use CommunitySDKs\GoDaddy\Exception\Ans\AnsBadRequestException;
use CommunitySDKs\GoDaddy\Exception\Ans\AnsConflictException;
use CommunitySDKs\GoDaddy\Exception\Ans\AnsForbiddenException;
use CommunitySDKs\GoDaddy\Exception\Ans\AnsNotFoundException;
use CommunitySDKs\GoDaddy\Exception\Ans\AnsRateLimitException;
use CommunitySDKs\GoDaddy\Exception\Ans\AnsServerException;
use CommunitySDKs\GoDaddy\Exception\Ans\AnsUnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\Ans\AnsUnprocessableEntityException;
use CommunitySDKs\GoDaddy\Exception\ApiException;

final class AnsService extends AbstractService
{

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, 'ans');
    }

    public function search(SearchAgentsRequest $request): AgentSearchResponse
    {
        $response = $this->execute('GET', '/v1/agents', queryParams: $request->toQueryParams());
        return AgentSearchResponse::fromMixed($response);
    }

    public function register(RegisterAgentRequest $request): AgentDetailsResponse
    {
        $response = $this->execute('POST', '/v1/agents/register', body: $request->body);
        return AgentDetailsResponse::fromMixed($response);
    }

    public function resolve(ResolveAgentRequest $request): AgentDetailsResponse
    {
        $response = $this->execute('POST', '/v1/agents/resolution', body: $request->body);
        return AgentDetailsResponse::fromMixed($response);
    }

    public function get(GetAgentRequest $request): AgentDetailsResponse
    {
        $response = $this->execute('GET', '/v1/agents/{agentId}', pathParams: $request->toPathParams());
        return AgentDetailsResponse::fromMixed($response);
    }

    public function revoke(RevokeAgentRequest $request): AgentDetailsResponse
    {
        $response = $this->execute('POST', '/v1/agents/{agentId}/revoke', pathParams: $request->toPathParams(), body: $request->body);
        return AgentDetailsResponse::fromMixed($response);
    }

    public function verifyAcme(VerifyAcmeRequest $request): AgentDetailsResponse
    {
        $response = $this->execute('POST', '/v1/agents/{agentId}/verify-acme', pathParams: $request->toPathParams());
        return AgentDetailsResponse::fromMixed($response);
    }

    public function verifyDns(VerifyDnsRequest $request): AgentDetailsResponse
    {
        $response = $this->execute('POST', '/v1/agents/{agentId}/verify-dns', pathParams: $request->toPathParams());
        return AgentDetailsResponse::fromMixed($response);
    }

    public function getIdentityCertificates(GetIdentityCertificatesRequest $request): CertificateListResponse
    {
        $response = $this->execute('GET', '/v1/agents/{agentId}/certificates/identity', pathParams: $request->toPathParams());
        return CertificateListResponse::fromMixed($response);
    }

    public function submitIdentityCsr(SubmitIdentityCsrRequest $request): CsrSubmissionResponse
    {
        $response = $this->execute('POST', '/v1/agents/{agentId}/certificates/identity', pathParams: $request->toPathParams(), body: $request->body);
        return CsrSubmissionResponse::fromMixed($response);
    }

    public function getServerCertificates(GetServerCertificatesRequest $request): CertificateListResponse
    {
        $response = $this->execute('GET', '/v1/agents/{agentId}/certificates/server', pathParams: $request->toPathParams());
        return CertificateListResponse::fromMixed($response);
    }

    public function submitServerCsr(SubmitServerCsrRequest $request): CsrSubmissionResponse
    {
        $response = $this->execute('POST', '/v1/agents/{agentId}/certificates/server', pathParams: $request->toPathParams(), body: $request->body);
        return CsrSubmissionResponse::fromMixed($response);
    }

    public function getCsrStatus(GetCsrStatusRequest $request): CsrStatusResponse
    {
        $response = $this->execute('GET', '/v1/agents/{agentId}/csrs/{csrId}/status', pathParams: $request->toPathParams());
        return CsrStatusResponse::fromMixed($response);
    }

    public function events(GetAgentEventsRequest $request): EventPageResponse
    {
        $response = $this->execute('GET', '/v1/agents/events', queryParams: $request->toQueryParams(), headers: $request->toHeaders());
        return EventPageResponse::fromMixed($response);
    }

    private function execute(
        string $method,
        string $path,
        array $pathParams = [],
        array $queryParams = [],
        array $headers = [],
        mixed $body = null
    ): mixed {
        try {
            $response = $this->call(
                $method,
                $path,
                pathParams: $pathParams,
                queryParams: $queryParams,
                headers: $headers,
                body: $body
            );

            return $response;
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    private function mapException(ApiException $exception): AnsApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(AnsBadRequestException::class, $exception),
            401 => $this->rebuildException(AnsUnauthorizedException::class, $exception),
            403 => $this->rebuildException(AnsForbiddenException::class, $exception),
            404 => $this->rebuildException(AnsNotFoundException::class, $exception),
            409 => $this->rebuildException(AnsConflictException::class, $exception),
            422 => $this->rebuildException(AnsUnprocessableEntityException::class, $exception),
            429 => $this->rebuildException(AnsRateLimitException::class, $exception),
            default => $this->rebuildException(AnsServerException::class, $exception),
        };
    }

    /**
     * @param class-string<AnsApiException> $class
     */
    private function rebuildException(string $class, ApiException $exception): AnsApiException
    {
        return new $class(
            message: $exception->getMessage(),
            statusCode: $exception->getStatusCode(),
            responseBody: $exception->getResponseBody(),
            headers: $exception->getHeaders(),
            requestMethod: $exception->getRequestMethod(),
            requestUrl: $exception->getRequestUrl(),
            errorResponse: ErrorResponse::fromArray($this->decodeErrorBody($exception))
        );
    }

    private function decodeErrorBody(ApiException $exception): array
    {
        $body = $exception->getResponseBody();
        if ($body === '') {
            return [];
        }

        try {
            $decoded = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
            return is_array($decoded) ? $decoded : [];
        } catch (\JsonException) {
            return [];
        }
    }
}

