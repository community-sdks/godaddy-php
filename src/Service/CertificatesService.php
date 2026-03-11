<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\Dto\Certificates\Request\AddAlternateEmailAddressRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\CancelCertificateRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\CreateCertificateForEntitlementRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\CreateCertificateRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\DeleteCertificateCallbackRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\DownloadCertificateByEntitlementRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\DownloadCertificateRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetAcmeExternalAccountBindingRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCertificateCallbackRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCertificateEmailHistoryRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCertificateRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCertificatesByEntitlementRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCertificateSiteSealRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCustomerCertificateRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetDomainVerificationDetailsRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ListCertificateActionsRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ListCustomerCertificatesRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ListDomainVerificationsRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ListSubscriptionCertificatesRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ReissueCertificateRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\RenewCertificateRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ReplaceCertificateCallbackRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ResendCertificateEmailRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ResendCertificateEmailToAddressRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\RevokeCertificateRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\SearchSubscriptionsByDomainRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ValidateCertificateRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\VerifyCertificateDomainControlRequest;
use CommunitySDKs\GoDaddy\Dto\Certificates\Response\CertificateActionListResponse;
use CommunitySDKs\GoDaddy\Dto\Certificates\Response\CertificateAcmeExternalAccountBindingResponse;
use CommunitySDKs\GoDaddy\Dto\Certificates\Response\CertificateBundleResponse;
use CommunitySDKs\GoDaddy\Dto\Certificates\Response\CertificateCallbackResponse;
use CommunitySDKs\GoDaddy\Dto\Certificates\Response\CertificateCollectionResponse;
use CommunitySDKs\GoDaddy\Dto\Certificates\Response\CertificateDomainVerificationResponse;
use CommunitySDKs\GoDaddy\Dto\Certificates\Response\CertificateEmailHistoryResponse;
use CommunitySDKs\GoDaddy\Dto\Certificates\Response\CertificateIdentifierResponse;
use CommunitySDKs\GoDaddy\Dto\Certificates\Response\CertificateSiteSealResponse;
use CommunitySDKs\GoDaddy\Dto\Certificates\Response\CertificateValidationResponse;
use CommunitySDKs\GoDaddy\Dto\Certificates\Response\ErrorLimitResponse;
use CommunitySDKs\GoDaddy\Dto\Certificates\Response\ErrorResponse;
use CommunitySDKs\GoDaddy\Exception\ApiException;
use CommunitySDKs\GoDaddy\Exception\Certificates\CertificatesApiException;
use CommunitySDKs\GoDaddy\Exception\Certificates\CertificatesBadRequestException;
use CommunitySDKs\GoDaddy\Exception\Certificates\CertificatesConflictException;
use CommunitySDKs\GoDaddy\Exception\Certificates\CertificatesForbiddenException;
use CommunitySDKs\GoDaddy\Exception\Certificates\CertificatesNotFoundException;
use CommunitySDKs\GoDaddy\Exception\Certificates\CertificatesRateLimitException;
use CommunitySDKs\GoDaddy\Exception\Certificates\CertificatesServerException;
use CommunitySDKs\GoDaddy\Exception\Certificates\CertificatesUnauthorizedException;
use CommunitySDKs\GoDaddy\Exception\Certificates\CertificatesUnprocessableEntityException;

final class CertificatesService extends AbstractService
{

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, 'certificates');
    }

    public function create(CreateCertificateRequest $request): CertificateIdentifierResponse
    {
        return CertificateIdentifierResponse::fromMixed(
            $this->execute('POST', '/v1/certificates', headers: $request->toHeaders(), body: $request->toBody())
        );
    }

    public function validate(ValidateCertificateRequest $request): CertificateValidationResponse
    {
        return CertificateValidationResponse::fromMixed(
            $this->execute('POST', '/v1/certificates/validate', headers: $request->toHeaders(), body: $request->toBody())
        );
    }

    public function get(GetCertificateRequest $request): CertificateIdentifierResponse
    {
        return CertificateIdentifierResponse::fromMixed(
            $this->execute('GET', '/v1/certificates/{certificateId}', pathParams: $request->toPathParams())
        );
    }

    public function listActions(ListCertificateActionsRequest $request): CertificateActionListResponse
    {
        return CertificateActionListResponse::fromMixed(
            $this->execute('GET', '/v1/certificates/{certificateId}/actions', pathParams: $request->toPathParams())
        );
    }

    public function resendEmail(ResendCertificateEmailRequest $request): CertificateIdentifierResponse
    {
        return CertificateIdentifierResponse::fromMixed(
            $this->execute('POST', '/v1/certificates/{certificateId}/email/{emailId}/resend', pathParams: $request->toPathParams())
        );
    }

    public function addAlternateEmailAddress(AddAlternateEmailAddressRequest $request): CertificateIdentifierResponse
    {
        return CertificateIdentifierResponse::fromMixed(
            $this->execute('POST', '/v1/certificates/{certificateId}/email/resend/{emailAddress}', pathParams: $request->toPathParams())
        );
    }

    public function resendEmailToAddress(ResendCertificateEmailToAddressRequest $request): CertificateIdentifierResponse
    {
        return CertificateIdentifierResponse::fromMixed(
            $this->execute('POST', '/v1/certificates/{certificateId}/email/{emailId}/resend/{emailAddress}', pathParams: $request->toPathParams())
        );
    }

    public function getEmailHistory(GetCertificateEmailHistoryRequest $request): CertificateEmailHistoryResponse
    {
        return CertificateEmailHistoryResponse::fromMixed(
            $this->execute('GET', '/v1/certificates/{certificateId}/email/history', pathParams: $request->toPathParams())
        );
    }

    public function deleteCallback(DeleteCertificateCallbackRequest $request): CertificateCallbackResponse
    {
        return CertificateCallbackResponse::fromMixed(
            $this->execute('DELETE', '/v1/certificates/{certificateId}/callback', pathParams: $request->toPathParams())
        );
    }

    public function getCallback(GetCertificateCallbackRequest $request): CertificateCallbackResponse
    {
        return CertificateCallbackResponse::fromMixed(
            $this->execute('GET', '/v1/certificates/{certificateId}/callback', pathParams: $request->toPathParams())
        );
    }

    public function replaceCallback(ReplaceCertificateCallbackRequest $request): CertificateCallbackResponse
    {
        return CertificateCallbackResponse::fromMixed(
            $this->execute('PUT', '/v1/certificates/{certificateId}/callback', pathParams: $request->toPathParams(), queryParams: $request->toQueryParams())
        );
    }

    public function cancel(CancelCertificateRequest $request): CertificateIdentifierResponse
    {
        return CertificateIdentifierResponse::fromMixed(
            $this->execute('POST', '/v1/certificates/{certificateId}/cancel', pathParams: $request->toPathParams())
        );
    }

    public function download(DownloadCertificateRequest $request): CertificateBundleResponse
    {
        return CertificateBundleResponse::fromMixed(
            $this->execute('GET', '/v1/certificates/{certificateId}/download', pathParams: $request->toPathParams())
        );
    }

    public function reissue(ReissueCertificateRequest $request): CertificateIdentifierResponse
    {
        return CertificateIdentifierResponse::fromMixed(
            $this->execute('POST', '/v1/certificates/{certificateId}/reissue', pathParams: $request->toPathParams(), body: $request->toBody())
        );
    }

    public function renew(RenewCertificateRequest $request): CertificateIdentifierResponse
    {
        return CertificateIdentifierResponse::fromMixed(
            $this->execute('POST', '/v1/certificates/{certificateId}/renew', pathParams: $request->toPathParams(), body: $request->toBody())
        );
    }

    public function revoke(RevokeCertificateRequest $request): CertificateIdentifierResponse
    {
        return CertificateIdentifierResponse::fromMixed(
            $this->execute('POST', '/v1/certificates/{certificateId}/revoke', pathParams: $request->toPathParams(), body: $request->toBody())
        );
    }

    public function getSiteSeal(GetCertificateSiteSealRequest $request): CertificateSiteSealResponse
    {
        return CertificateSiteSealResponse::fromMixed(
            $this->execute('GET', '/v1/certificates/{certificateId}/siteSeal', pathParams: $request->toPathParams(), queryParams: $request->toQueryParams())
        );
    }

    public function verifyDomainControl(VerifyCertificateDomainControlRequest $request): CertificateIdentifierResponse
    {
        return CertificateIdentifierResponse::fromMixed(
            $this->execute('POST', '/v1/certificates/{certificateId}/verifyDomainControl', pathParams: $request->toPathParams())
        );
    }

    public function getByEntitlement(GetCertificatesByEntitlementRequest $request): CertificateCollectionResponse
    {
        return CertificateCollectionResponse::fromMixed(
            $this->execute('GET', '/v2/certificates', queryParams: $request->toQueryParams())
        );
    }

    public function createForEntitlement(CreateCertificateForEntitlementRequest $request): CertificateIdentifierResponse
    {
        return CertificateIdentifierResponse::fromMixed(
            $this->execute('POST', '/v2/certificates', headers: $request->toHeaders(), body: $request->toBody())
        );
    }

    public function downloadByEntitlement(DownloadCertificateByEntitlementRequest $request): CertificateBundleResponse
    {
        return CertificateBundleResponse::fromMixed(
            $this->execute('GET', '/v2/certificates/download', queryParams: $request->toQueryParams())
        );
    }

    public function listCustomerCertificates(ListCustomerCertificatesRequest $request): CertificateCollectionResponse
    {
        return CertificateCollectionResponse::fromMixed(
            $this->execute('GET', '/v2/customers/{customerId}/certificates', pathParams: $request->toPathParams(), queryParams: $request->toQueryParams())
        );
    }

    public function getCustomerCertificate(GetCustomerCertificateRequest $request): CertificateIdentifierResponse
    {
        return CertificateIdentifierResponse::fromMixed(
            $this->execute('GET', '/v2/customers/{customerId}/certificates/{certificateId}', pathParams: $request->toPathParams())
        );
    }

    public function listDomainVerifications(ListDomainVerificationsRequest $request): CertificateCollectionResponse
    {
        return CertificateCollectionResponse::fromMixed(
            $this->execute('GET', '/v2/customers/{customerId}/certificates/{certificateId}/domainVerifications', pathParams: $request->toPathParams())
        );
    }

    public function getDomainVerificationDetails(GetDomainVerificationDetailsRequest $request): CertificateDomainVerificationResponse
    {
        return CertificateDomainVerificationResponse::fromMixed(
            $this->execute('GET', '/v2/customers/{customerId}/certificates/{certificateId}/domainVerifications/{domain}', pathParams: $request->toPathParams())
        );
    }

    public function getAcmeExternalAccountBinding(GetAcmeExternalAccountBindingRequest $request): CertificateAcmeExternalAccountBindingResponse
    {
        return CertificateAcmeExternalAccountBindingResponse::fromMixed(
            $this->execute('GET', '/v2/customers/{customerId}/certificates/acme/externalAccountBinding', pathParams: $request->toPathParams())
        );
    }

    public function searchSubscriptionsByDomain(SearchSubscriptionsByDomainRequest $request): CertificateCollectionResponse
    {
        return CertificateCollectionResponse::fromMixed(
            $this->execute('GET', '/v2/certificates/subscriptions/search', queryParams: $request->toQueryParams())
        );
    }

    public function listSubscriptionCertificates(ListSubscriptionCertificatesRequest $request): CertificateCollectionResponse
    {
        return CertificateCollectionResponse::fromMixed(
            $this->execute('GET', '/v2/certificates/subscription/{guid}', pathParams: $request->toPathParams(), queryParams: $request->toQueryParams())
        );
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
            return $this->call(
                $method,
                $path,
                pathParams: $pathParams,
                queryParams: $queryParams,
                headers: $headers,
                body: $body
            );
        } catch (ApiException $exception) {
            throw $this->mapException($exception);
        }
    }

    private function mapException(ApiException $exception): CertificatesApiException
    {
        return match ($exception->getStatusCode()) {
            400 => $this->rebuildException(CertificatesBadRequestException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            401 => $this->rebuildException(CertificatesUnauthorizedException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            403 => $this->rebuildException(CertificatesForbiddenException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            404 => $this->rebuildException(CertificatesNotFoundException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            409 => $this->rebuildException(CertificatesConflictException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            422 => $this->rebuildException(CertificatesUnprocessableEntityException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
            429 => $this->rebuildException(CertificatesRateLimitException::class, $exception, ErrorLimitResponse::fromArray($this->decodeErrorBody($exception))),
            default => $this->rebuildException(CertificatesServerException::class, $exception, ErrorResponse::fromArray($this->decodeErrorBody($exception))),
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
     * @param class-string<CertificatesApiException> $class
     */
    private function rebuildException(string $class, ApiException $exception, object $errorResponse): CertificatesApiException
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

