<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainActionTypeRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainBodyRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainIncludesRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainOptionalBodyRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainReasonRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainRegistrarRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerIdRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerNotificationAckRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerNotificationOptInUpdateRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerNotificationSchemaRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerRegisterRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerRegisterSchemaRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerRegisterValidateRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainAvailabilityBulkRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainAvailabilityRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainBodyRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainContactsValidateRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainForwardingRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainMaintenanceRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainPathRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainPurchaseRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainRenewRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainSchemaRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainSuggestRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainTypeBodyRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainTypeNameBodyRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainTypeNameLookupRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainsAgreementRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainsListRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainsMaintenanceListRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainsTldsRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainsUsageRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainValidateRequest;
use CommunitySDKs\GoDaddy\Dto\Domains\Response\DomainsResponse;
use CommunitySDKs\GoDaddy\Dto\Domains\Response\ErrorLimitResponse;
use CommunitySDKs\GoDaddy\Dto\Domains\Response\ErrorResponse;
use CommunitySDKs\GoDaddy\Exception\ApiException;
use CommunitySDKs\GoDaddy\Exception\Domains\DomainsApiException;
use CommunitySDKs\GoDaddy\Exception\Domains\DomainsBadRequestException;
use CommunitySDKs\GoDaddy\Exception\Domains\DomainsConflictException;
use CommunitySDKs\GoDaddy\Exception\Domains\DomainsForbiddenException;
use CommunitySDKs\GoDaddy\Exception\Domains\DomainsNotFoundException;
use CommunitySDKs\GoDaddy\Exception\Domains\DomainsRateLimitException;
use CommunitySDKs\GoDaddy\Exception\Domains\DomainsServerException;
use CommunitySDKs\GoDaddy\Exception\Domains\DomainsUnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\Domains\DomainsUnprocessableEntityException;

final class DomainsService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function list(DomainsListRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v1/domains', queryParams: $request->toQueryParams(), headers: $request->toHeaders());
    }

    public function getAgreement(DomainsAgreementRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v1/domains/agreements', queryParams: $request->toQueryParams(), headers: $request->toHeaders());
    }

    public function available(DomainAvailabilityRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v1/domains/available', queryParams: $request->toQueryParams());
    }

    public function availableBulk(DomainAvailabilityBulkRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v1/domains/available', queryParams: $request->toQueryParams(), body: $request->toBody());
    }

    public function contactsValidate(DomainContactsValidateRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v1/domains/contacts/validate', queryParams: $request->toQueryParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function purchase(DomainPurchaseRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v1/domains/purchase', headers: $request->toHeaders(), body: $request->body);
    }

    public function schema(DomainSchemaRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v1/domains/purchase/schema/{tld}', pathParams: $request->toPathParams());
    }

    public function validate(DomainValidateRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v1/domains/purchase/validate', body: $request->body);
    }

    public function suggest(DomainSuggestRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v1/domains/suggest', queryParams: $request->toQueryParams(), headers: $request->toHeaders());
    }

    public function tlds(DomainsTldsRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v1/domains/tlds');
    }

    public function cancel(DomainPathRequest $request): DomainsResponse
    {
        return $this->execute('DELETE', '/v1/domains/{domain}', pathParams: ['domain' => $request->domain]);
    }

    public function get(DomainPathRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v1/domains/{domain}', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function update(DomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('PATCH', '/v1/domains/{domain}', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function updateContacts(DomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('PATCH', '/v1/domains/{domain}/contacts', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function cancelPrivacy(DomainPathRequest $request): DomainsResponse
    {
        return $this->execute('DELETE', '/v1/domains/{domain}/privacy', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function purchasePrivacy(DomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v1/domains/{domain}/privacy/purchase', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function recordAdd(DomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('PATCH', '/v1/domains/{domain}/records', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function recordReplace(DomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('PUT', '/v1/domains/{domain}/records', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function recordGet(DomainTypeNameLookupRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v1/domains/{domain}/records/{type}/{name}', pathParams: $request->toPathParams(), queryParams: $request->toQueryParams(), headers: $request->toHeaders());
    }

    public function recordReplaceTypeName(DomainTypeNameBodyRequest $request): DomainsResponse
    {
        return $this->execute('PUT', '/v1/domains/{domain}/records/{type}/{name}', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function recordDeleteTypeName(DomainTypeNameLookupRequest $request): DomainsResponse
    {
        return $this->execute('DELETE', '/v1/domains/{domain}/records/{type}/{name}', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function recordReplaceType(DomainTypeBodyRequest $request): DomainsResponse
    {
        return $this->execute('PUT', '/v1/domains/{domain}/records/{type}', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function renew(DomainRenewRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v1/domains/{domain}/renew', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function transferIn(DomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v1/domains/{domain}/transfer', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function verifyEmail(DomainPathRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v1/domains/{domain}/verifyRegistrantEmail', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function getCustomerDomain(CustomerDomainIncludesRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/customers/{customerId}/domains/{domain}', pathParams: $request->toPathParams(), queryParams: $request->toQueryParams(), headers: $request->toHeaders());
    }

    public function cancelCustomerDomainChangeOfRegistrant(CustomerDomainRequest $request): DomainsResponse
    {
        return $this->execute('DELETE', '/v2/customers/{customerId}/domains/{domain}/changeOfRegistrant', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function getCustomerDomainChangeOfRegistrant(CustomerDomainRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/customers/{customerId}/domains/{domain}/changeOfRegistrant', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function addCustomerDomainDnssecRecords(CustomerDomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('PATCH', '/v2/customers/{customerId}/domains/{domain}/dnssecRecords', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function removeCustomerDomainDnssecRecords(CustomerDomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('DELETE', '/v2/customers/{customerId}/domains/{domain}/dnssecRecords', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function replaceCustomerDomainNameServers(CustomerDomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('PUT', '/v2/customers/{customerId}/domains/{domain}/nameServers', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function getCustomerDomainPrivacyForwarding(CustomerDomainRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/customers/{customerId}/domains/{domain}/privacy/forwarding', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function updateCustomerDomainPrivacyForwarding(CustomerDomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('PATCH', '/v2/customers/{customerId}/domains/{domain}/privacy/forwarding', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function redeemCustomerDomain(CustomerDomainOptionalBodyRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/{domain}/redeem', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function renewCustomerDomain(CustomerDomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/{domain}/renew', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function transferCustomerDomain(CustomerDomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/{domain}/transfer', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function getCustomerDomainTransferStatus(CustomerDomainRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/customers/{customerId}/domains/{domain}/transfer', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function validateCustomerDomainTransfer(CustomerDomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/{domain}/transfer/validate', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function acceptCustomerDomainTransferIn(CustomerDomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/{domain}/transferInAccept', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function cancelCustomerDomainTransferIn(CustomerDomainRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/{domain}/transferInCancel', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function restartCustomerDomainTransferIn(CustomerDomainRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/{domain}/transferInRestart', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function retryCustomerDomainTransferIn(CustomerDomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/{domain}/transferInRetry', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function initiateCustomerDomainTransferOut(CustomerDomainRegistrarRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/{domain}/transferOut', pathParams: $request->toPathParams(), queryParams: $request->toQueryParams(), headers: $request->toHeaders());
    }

    public function acceptCustomerDomainTransferOut(CustomerDomainRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/{domain}/transferOutAccept', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function rejectCustomerDomainTransferOut(CustomerDomainReasonRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/{domain}/transferOutReject', pathParams: $request->toPathParams(), queryParams: $request->toQueryParams(), headers: $request->toHeaders());
    }

    public function deleteDomainForwarding(DomainForwardingRequest $request): DomainsResponse
    {
        return $this->execute('DELETE', '/v2/customers/{customerId}/domains/forwards/{fqdn}', pathParams: $request->toPathParams());
    }

    public function getDomainForwarding(DomainForwardingRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/customers/{customerId}/domains/forwards/{fqdn}', pathParams: $request->toPathParams(), queryParams: $request->toQueryParams());
    }

    public function updateDomainForwarding(DomainForwardingRequest $request): DomainsResponse
    {
        return $this->execute('PUT', '/v2/customers/{customerId}/domains/forwards/{fqdn}', pathParams: $request->toPathParams(), body: $request->body);
    }

    public function createDomainForwarding(DomainForwardingRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/forwards/{fqdn}', pathParams: $request->toPathParams(), body: $request->body);
    }

    public function listCustomerDomainActions(CustomerDomainRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/customers/{customerId}/domains/{domain}/actions', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function cancelCustomerDomainAction(CustomerDomainActionTypeRequest $request): DomainsResponse
    {
        return $this->execute('DELETE', '/v2/customers/{customerId}/domains/{domain}/actions/{type}', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function getCustomerDomainAction(CustomerDomainActionTypeRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/customers/{customerId}/domains/{domain}/actions/{type}', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function getCustomerDomainNotifications(CustomerIdRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/customers/{customerId}/domains/notifications', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function getCustomerDomainNotificationOptIns(CustomerIdRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/customers/{customerId}/domains/notifications/optIn', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function updateCustomerDomainNotificationOptIns(CustomerNotificationOptInUpdateRequest $request): DomainsResponse
    {
        return $this->execute('PUT', '/v2/customers/{customerId}/domains/notifications/optIn', pathParams: $request->toPathParams(), queryParams: $request->toQueryParams(), headers: $request->toHeaders());
    }

    public function getCustomerDomainNotificationSchema(CustomerNotificationSchemaRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/customers/{customerId}/domains/notifications/schemas/{type}', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function acknowledgeCustomerDomainNotification(CustomerNotificationAckRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/notifications/{notificationId}/acknowledge', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function registerCustomerDomain(CustomerRegisterRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/register', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function getCustomerDomainRegisterSchema(CustomerRegisterSchemaRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/customers/{customerId}/domains/register/schema/{tld}', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function validateCustomerDomainRegister(CustomerRegisterValidateRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/register/validate', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function listDomainMaintenances(DomainsMaintenanceListRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/domains/maintenances', queryParams: $request->toQueryParams(), headers: $request->toHeaders());
    }

    public function getDomainMaintenance(DomainMaintenanceRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/domains/maintenances/{maintenanceId}', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    public function getDomainUsage(DomainsUsageRequest $request): DomainsResponse
    {
        return $this->execute('GET', '/v2/domains/usage/{yyyymm}', pathParams: $request->toPathParams(), queryParams: $request->toQueryParams(), headers: $request->toHeaders());
    }

    public function updateCustomerDomainContacts(CustomerDomainBodyRequest $request): DomainsResponse
    {
        return $this->execute('PATCH', '/v2/customers/{customerId}/domains/{domain}/contacts', pathParams: $request->toPathParams(), headers: $request->toHeaders(), body: $request->body);
    }

    public function regenerateCustomerDomainAuthCode(CustomerDomainRequest $request): DomainsResponse
    {
        return $this->execute('POST', '/v2/customers/{customerId}/domains/{domain}/regenerateAuthCode', pathParams: $request->toPathParams(), headers: $request->toHeaders());
    }

    private function execute(
        string $method,
        string $path,
        array $pathParams = [],
        array $queryParams = [],
        array $headers = [],
        mixed $body = null
    ): DomainsResponse {
        try {
            $response = $this->call($method, $path, $pathParams, $queryParams, $headers, $body);
            return DomainsResponse::fromMixed($response);
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    private function mapException(ApiException $exception): DomainsApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(DomainsBadRequestException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            401 => $this->rebuildException(DomainsUnauthorizedException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            403 => $this->rebuildException(DomainsForbiddenException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            404 => $this->rebuildException(DomainsNotFoundException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            409 => $this->rebuildException(DomainsConflictException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            422 => $this->rebuildException(DomainsUnprocessableEntityException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            429 => $this->rebuildException(DomainsRateLimitException::class, $exception, ErrorLimitResponse::fromArray($this->decodeErrorBody($exception))),
            default => $this->rebuildException(DomainsServerException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
        };
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

    /**
     * @param class-string<DomainsApiException> $class
     */
    private function rebuildException(string $class, ApiException $exception, object $errorResponse): DomainsApiException
    {
        return new $class(
            message: $exception->getMessage(),
            statusCode: $exception->getStatusCode(),
            responseBody: $exception->getResponseBody(),
            headers: $exception->getHeaders(),
            requestMethod: $exception->getRequestMethod(),
            requestUrl: $exception->getRequestUrl(),
            errorResponse: $errorResponse
        );
    }
}
