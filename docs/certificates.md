# Certificates Service

This document covers the Certificates service in the GoDaddy PHP SDK.

Client accessor: `$client->certificates()`

All methods use typed request DTOs and return `CertificatesResponse`.

## Methods

- `create(CreateCertificateRequest $request): CertificatesResponse`
- `validate(ValidateCertificateRequest $request): CertificatesResponse`
- `get(GetCertificateRequest $request): CertificatesResponse`
- `listActions(ListCertificateActionsRequest $request): CertificatesResponse`
- `resendEmail(ResendCertificateEmailRequest $request): CertificatesResponse`
- `addAlternateEmailAddress(AddAlternateEmailAddressRequest $request): CertificatesResponse`
- `resendEmailToAddress(ResendCertificateEmailToAddressRequest $request): CertificatesResponse`
- `getEmailHistory(GetCertificateEmailHistoryRequest $request): CertificatesResponse`
- `deleteCallback(DeleteCertificateCallbackRequest $request): CertificatesResponse`
- `getCallback(GetCertificateCallbackRequest $request): CertificatesResponse`
- `replaceCallback(ReplaceCertificateCallbackRequest $request): CertificatesResponse`
- `cancel(CancelCertificateRequest $request): CertificatesResponse`
- `download(DownloadCertificateRequest $request): CertificatesResponse`
- `reissue(ReissueCertificateRequest $request): CertificatesResponse`
- `renew(RenewCertificateRequest $request): CertificatesResponse`
- `revoke(RevokeCertificateRequest $request): CertificatesResponse`
- `getSiteSeal(GetCertificateSiteSealRequest $request): CertificatesResponse`
- `verifyDomainControl(VerifyCertificateDomainControlRequest $request): CertificatesResponse`
- `getByEntitlement(GetCertificatesByEntitlementRequest $request): CertificatesResponse`
- `createForEntitlement(CreateCertificateForEntitlementRequest $request): CertificatesResponse`
- `downloadByEntitlement(DownloadCertificateByEntitlementRequest $request): CertificatesResponse`
- `listCustomerCertificates(ListCustomerCertificatesRequest $request): CertificatesResponse`
- `getCustomerCertificate(GetCustomerCertificateRequest $request): CertificatesResponse`
- `listDomainVerifications(ListDomainVerificationsRequest $request): CertificatesResponse`
- `getDomainVerificationDetails(GetDomainVerificationDetailsRequest $request): CertificatesResponse`
- `getAcmeExternalAccountBinding(GetAcmeExternalAccountBindingRequest $request): CertificatesResponse`
- `searchSubscriptionsByDomain(SearchSubscriptionsByDomainRequest $request): CertificatesResponse`
- `listSubscriptionCertificates(ListSubscriptionCertificatesRequest $request): CertificatesResponse`

## Example

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCertificateRequest;

$response = $client->certificates()->get(new GetCertificateRequest('certificate-id'));
$data = $response->data;
```

## Exceptions

Certificates endpoints now throw dedicated exceptions in `CommunitySDKs\GoDaddy\Exception\Certificates\*`:

- `CertificatesBadRequestException`
- `CertificatesUnauthorizedException`
- `CertificatesForbiddenException`
- `CertificatesNotFoundException`
- `CertificatesConflictException`
- `CertificatesUnprocessableEntityException`
- `CertificatesRateLimitException`
- `CertificatesServerException`

Each exception extends `CertificatesApiException` and exposes `getErrorResponse()`.

