<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\Dto\Abuse\Request\CreateTicketRequest;
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\CreateTicketV2Request;
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\GetTicketInfoRequest;
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\GetTicketInfoV2Request;
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\GetTicketsRequest;
use CommunitySDKs\GoDaddy\Dto\Abuse\Request\GetTicketsV2Request;
use CommunitySDKs\GoDaddy\Dto\Abuse\Response\AbuseTicketDetailsResponse;
use CommunitySDKs\GoDaddy\Dto\Abuse\Response\AbuseTicketIdResponse;
use CommunitySDKs\GoDaddy\Dto\Abuse\Response\AbuseTicketListResponse;
use CommunitySDKs\GoDaddy\Dto\Abuse\Response\ErrorResponse;
use CommunitySDKs\GoDaddy\Exception\Abuse\AbuseApiException;
use CommunitySDKs\GoDaddy\Exception\Abuse\AbuseForbiddenException;
use CommunitySDKs\GoDaddy\Exception\Abuse\AbuseNotFoundException;
use CommunitySDKs\GoDaddy\Exception\Abuse\AbuseServerException;
use CommunitySDKs\GoDaddy\Exception\Abuse\AbuseUnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\Abuse\AbuseUnprocessableEntityException;
use CommunitySDKs\GoDaddy\Exception\ApiException;

final class AbuseService extends AbstractService
{

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, 'abuse');
    }

    public function getTickets(GetTicketsRequest $request): AbuseTicketListResponse
    {
        $response = $this->execute('GET', '/v1/abuse/tickets', queryParams: $request->toQueryParams());
        return AbuseTicketListResponse::fromMixed($response);
    }

    public function createTicket(CreateTicketRequest $request): AbuseTicketIdResponse
    {
        $response = $this->execute('POST', '/v1/abuse/tickets', body: $request->body);
        return AbuseTicketIdResponse::fromMixed($response);
    }

    public function getTicketInfo(GetTicketInfoRequest $request): AbuseTicketDetailsResponse
    {
        $response = $this->execute('GET', '/v1/abuse/tickets/{ticketId}', pathParams: $request->toPathParams());
        return AbuseTicketDetailsResponse::fromMixed($response);
    }

    public function getTicketsV2(GetTicketsV2Request $request): AbuseTicketListResponse
    {
        $response = $this->execute('GET', '/v2/abuse/tickets', queryParams: $request->toQueryParams());
        return AbuseTicketListResponse::fromMixed($response);
    }

    public function createTicketV2(CreateTicketV2Request $request): AbuseTicketIdResponse
    {
        $response = $this->execute('POST', '/v2/abuse/tickets', body: $request->body);
        return AbuseTicketIdResponse::fromMixed($response);
    }

    public function getTicketInfoV2(GetTicketInfoV2Request $request): AbuseTicketDetailsResponse
    {
        $response = $this->execute('GET', '/v2/abuse/tickets/{ticketId}', pathParams: $request->toPathParams());
        return AbuseTicketDetailsResponse::fromMixed($response);
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

    private function mapException(ApiException $exception): AbuseApiException
    {
        return match ($exception->getStatusCode()) {
            401 => $this->rebuildException(AbuseUnauthorizedException::class, $exception),
            403 => $this->rebuildException(AbuseForbiddenException::class, $exception),
            404 => $this->rebuildException(AbuseNotFoundException::class, $exception),
            422 => $this->rebuildException(AbuseUnprocessableEntityException::class, $exception),
            default => $this->rebuildException(AbuseServerException::class, $exception),
        };
    }

    /**
     * @param class-string<AbuseApiException> $class
     */
    private function rebuildException(string $class, ApiException $exception): AbuseApiException
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

