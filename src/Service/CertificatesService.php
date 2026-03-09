<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

final class CertificatesService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function certificateCreate(array $certificateCreate, ?string $xMarketId = null): mixed
    {
        return $this->call('POST', '/v1/certificates', headers: ['X-Market-Id' => $xMarketId], body: $certificateCreate);
    }

    public function certificateValidate(array $certificateCreate, ?string $xMarketId = null): mixed
    {
        return $this->call('POST', '/v1/certificates/validate', headers: ['X-Market-Id' => $xMarketId], body: $certificateCreate);
    }

    public function certificateGet(string $certificateId): mixed
    {
        return $this->call('GET', '/v1/certificates/{certificateId}', pathParams: compact('certificateId'));
    }

    public function certificateActionRetrieve(string $certificateId): mixed
    {
        return $this->call('GET', '/v1/certificates/{certificateId}/actions', pathParams: compact('certificateId'));
    }

    public function certificateResendEmail(string $certificateId, string $emailId): mixed
    {
        return $this->call('POST', '/v1/certificates/{certificateId}/email/{emailId}/resend', pathParams: compact('certificateId', 'emailId'));
    }

    public function certificateAlternateEmailAddress(string $certificateId, string $emailAddress): mixed
    {
        return $this->call('POST', '/v1/certificates/{certificateId}/email/resend/{emailAddress}', pathParams: compact('certificateId', 'emailAddress'));
    }

    public function certificateResendEmailAddress(string $certificateId, string $emailId, string $emailAddress): mixed
    {
        return $this->call('POST', '/v1/certificates/{certificateId}/email/{emailId}/resend/{emailAddress}', pathParams: compact('certificateId', 'emailId', 'emailAddress'));
    }

    public function certificateEmailHistory(string $certificateId): mixed
    {
        return $this->call('GET', '/v1/certificates/{certificateId}/email/history', pathParams: compact('certificateId'));
    }

    public function certificateCallbackDelete(string $certificateId): mixed
    {
        return $this->call('DELETE', '/v1/certificates/{certificateId}/callback', pathParams: compact('certificateId'));
    }

    public function certificateCallbackGet(string $certificateId): mixed
    {
        return $this->call('GET', '/v1/certificates/{certificateId}/callback', pathParams: compact('certificateId'));
    }

    public function certificateCallbackReplace(string $certificateId, string $callbackUrl): mixed
    {
        return $this->call('PUT', '/v1/certificates/{certificateId}/callback', pathParams: compact('certificateId'), queryParams: compact('callbackUrl'));
    }

    public function certificateCancel(string $certificateId): mixed
    {
        return $this->call('POST', '/v1/certificates/{certificateId}/cancel', pathParams: compact('certificateId'));
    }

    public function certificateDownload(string $certificateId): mixed
    {
        return $this->call('GET', '/v1/certificates/{certificateId}/download', pathParams: compact('certificateId'));
    }

    public function certificateReissue(string $certificateId, array $reissueCreate): mixed
    {
        return $this->call('POST', '/v1/certificates/{certificateId}/reissue', pathParams: compact('certificateId'), body: $reissueCreate);
    }

    public function certificateRenew(string $certificateId, array $renewCreate): mixed
    {
        return $this->call('POST', '/v1/certificates/{certificateId}/renew', pathParams: compact('certificateId'), body: $renewCreate);
    }

    public function certificateRevoke(string $certificateId, array $certificateRevoke): mixed
    {
        return $this->call('POST', '/v1/certificates/{certificateId}/revoke', pathParams: compact('certificateId'), body: $certificateRevoke);
    }

    public function certificateSitesealGet(string $certificateId, mixed $theme = null, mixed $locale = null): mixed
    {
        return $this->call('GET', '/v1/certificates/{certificateId}/siteSeal', pathParams: compact('certificateId'), queryParams: compact('theme', 'locale'));
    }

    public function certificateVerifyDomainControl(string $certificateId): mixed
    {
        return $this->call('POST', '/v1/certificates/{certificateId}/verifyDomainControl', pathParams: compact('certificateId'));
    }

    public function certificateGetEntitlement(string $entitlementId, ?bool $latest = null): mixed
    {
        return $this->call('GET', '/v2/certificates', queryParams: compact('entitlementId', 'latest'));
    }

    public function certificateCreateV2(array $subscriptionCertificateCreate, ?string $xMarketId = null): mixed
    {
        return $this->call('POST', '/v2/certificates', headers: ['X-Market-Id' => $xMarketId], body: $subscriptionCertificateCreate);
    }

    public function certificateDownloadEntitlement(string $entitlementId): mixed
    {
        return $this->call('GET', '/v2/certificates/download', queryParams: compact('entitlementId'));
    }

    public function getCustomerCertificatesByCustomerId(string $customerId, ?int $offset = null, ?int $limit = null): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/certificates', pathParams: compact('customerId'), queryParams: compact('offset', 'limit'));
    }

    public function getCertificateDetailByCertIdentifier(string $customerId, string $certificateId): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/certificates/{certificateId}', pathParams: compact('customerId', 'certificateId'));
    }

    public function getDomainInformationByCertificateId(string $customerId, string $certificateId): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/certificates/{certificateId}/domainVerifications', pathParams: compact('customerId', 'certificateId'));
    }

    public function getDomainDetailsByDomain(string $customerId, string $certificateId, string $domain): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/certificates/{certificateId}/domainVerifications/{domain}', pathParams: compact('customerId', 'certificateId', 'domain'));
    }

    public function getAcmeExternalAccountBinding(string $customerId): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/certificates/acme/externalAccountBinding', pathParams: compact('customerId'));
    }

    public function retrieveSslByDomainReseller(?int $pageSize = null, ?int $page = null, ?string $domain = null, ?string $status = null, ?string $type = null, ?string $validation = null): mixed
    {
        return $this->call('GET', '/v2/certificates/subscriptions/search', queryParams: compact('pageSize', 'page', 'domain', 'status', 'type', 'validation'));
    }

    public function retrieveSslByDomainSubscriptionReseller(string $guid, ?int $pageSize = null, ?int $page = null, ?string $domain = null, ?string $status = null, ?string $type = null, ?string $validation = null): mixed
    {
        return $this->call('GET', '/v2/certificates/subscription/{guid}', pathParams: compact('guid'), queryParams: compact('pageSize', 'page', 'domain', 'status', 'type', 'validation'));
    }
}
