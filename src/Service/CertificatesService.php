<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Service;

final class CertificatesService extends DynamicOperationService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public const OPERATIONS = [
        'certificate_create' => ['method' => 'POST', 'path' => '/v1/certificates', 'params' => [['name' => 'X-Market-Id', 'in' => 'header', 'required' => false], ['name' => 'certificateCreate', 'in' => 'body', 'required' => true]]],
        'certificate_validate' => ['method' => 'POST', 'path' => '/v1/certificates/validate', 'params' => [['name' => 'X-Market-Id', 'in' => 'header', 'required' => false], ['name' => 'certificateCreate', 'in' => 'body', 'required' => true]]],
        'certificate_get' => ['method' => 'GET', 'path' => '/v1/certificates/{certificateId}', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true]]],
        'certificate_action_retrieve' => ['method' => 'GET', 'path' => '/v1/certificates/{certificateId}/actions', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true]]],
        'certificate_resend_email' => ['method' => 'POST', 'path' => '/v1/certificates/{certificateId}/email/{emailId}/resend', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true], ['name' => 'emailId', 'in' => 'path', 'required' => true]]],
        'certificate_alternate_email_address' => ['method' => 'POST', 'path' => '/v1/certificates/{certificateId}/email/resend/{emailAddress}', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true], ['name' => 'emailAddress', 'in' => 'path', 'required' => true]]],
        'certificate_resend_email_address' => ['method' => 'POST', 'path' => '/v1/certificates/{certificateId}/email/{emailId}/resend/{emailAddress}', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true], ['name' => 'emailId', 'in' => 'path', 'required' => true], ['name' => 'emailAddress', 'in' => 'path', 'required' => true]]],
        'certificate_email_history' => ['method' => 'GET', 'path' => '/v1/certificates/{certificateId}/email/history', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true]]],
        'certificate_callback_delete' => ['method' => 'DELETE', 'path' => '/v1/certificates/{certificateId}/callback', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true]]],
        'certificate_callback_get' => ['method' => 'GET', 'path' => '/v1/certificates/{certificateId}/callback', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true]]],
        'certificate_callback_replace' => ['method' => 'PUT', 'path' => '/v1/certificates/{certificateId}/callback', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true], ['name' => 'callbackUrl', 'in' => 'query', 'required' => true]]],
        'certificate_cancel' => ['method' => 'POST', 'path' => '/v1/certificates/{certificateId}/cancel', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true]]],
        'certificate_download' => ['method' => 'GET', 'path' => '/v1/certificates/{certificateId}/download', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true]]],
        'certificate_reissue' => ['method' => 'POST', 'path' => '/v1/certificates/{certificateId}/reissue', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true], ['name' => 'reissueCreate', 'in' => 'body', 'required' => true]]],
        'certificate_renew' => ['method' => 'POST', 'path' => '/v1/certificates/{certificateId}/renew', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true], ['name' => 'renewCreate', 'in' => 'body', 'required' => true]]],
        'certificate_revoke' => ['method' => 'POST', 'path' => '/v1/certificates/{certificateId}/revoke', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true], ['name' => 'certificateRevoke', 'in' => 'body', 'required' => true]]],
        'certificate_siteseal_get' => ['method' => 'GET', 'path' => '/v1/certificates/{certificateId}/siteSeal', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true], ['name' => 'theme', 'in' => 'query', 'required' => false], ['name' => 'locale', 'in' => 'query', 'required' => false]]],
        'certificate_verifydomaincontrol' => ['method' => 'POST', 'path' => '/v1/certificates/{certificateId}/verifyDomainControl', 'params' => [['name' => 'certificateId', 'in' => 'path', 'required' => true]]],
        'certificate_get_entitlement' => ['method' => 'GET', 'path' => '/v2/certificates', 'params' => [['name' => 'entitlementId', 'in' => 'query', 'required' => true], ['name' => 'latest', 'in' => 'query', 'required' => false]]],
        'certificate_create_v2' => ['method' => 'POST', 'path' => '/v2/certificates', 'params' => [['name' => 'X-Market-Id', 'in' => 'header', 'required' => false], ['name' => 'subscriptionCertificateCreate', 'in' => 'body', 'required' => true]]],
        'certificate_download_entitlement' => ['method' => 'GET', 'path' => '/v2/certificates/download', 'params' => [['name' => 'entitlementId', 'in' => 'query', 'required' => true]]],
        'getCustomerCertificatesByCustomerId' => ['method' => 'GET', 'path' => '/v2/customers/{customerId}/certificates', 'params' => [['name' => 'customerId', 'in' => 'path', 'required' => true], ['name' => 'offset', 'in' => 'query', 'required' => false], ['name' => 'limit', 'in' => 'query', 'required' => false]]],
        'getCertificateDetailByCertIdentifier' => ['method' => 'GET', 'path' => '/v2/customers/{customerId}/certificates/{certificateId}', 'params' => [['name' => 'customerId', 'in' => 'path', 'required' => true], ['name' => 'certificateId', 'in' => 'path', 'required' => true]]],
        'getDomainInformationByCertificateId' => ['method' => 'GET', 'path' => '/v2/customers/{customerId}/certificates/{certificateId}/domainVerifications', 'params' => [['name' => 'customerId', 'in' => 'path', 'required' => true], ['name' => 'certificateId', 'in' => 'path', 'required' => true]]],
        'getDomainDetailsByDomain' => ['method' => 'GET', 'path' => '/v2/customers/{customerId}/certificates/{certificateId}/domainVerifications/{domain}', 'params' => [['name' => 'customerId', 'in' => 'path', 'required' => true], ['name' => 'certificateId', 'in' => 'path', 'required' => true], ['name' => 'domain', 'in' => 'path', 'required' => true]]],
        'getAcmeExternalAccountBinding' => ['method' => 'GET', 'path' => '/v2/customers/{customerId}/certificates/acme/externalAccountBinding', 'params' => [['name' => 'customerId', 'in' => 'path', 'required' => true]]],
        'retrieveSslByDomainReseller' => ['method' => 'GET', 'path' => '/v2/certificates/subscriptions/search', 'params' => [['name' => 'pageSize', 'in' => 'query', 'required' => false], ['name' => 'page', 'in' => 'query', 'required' => false], ['name' => 'domain', 'in' => 'query', 'required' => false], ['name' => 'status', 'in' => 'query', 'required' => false], ['name' => 'type', 'in' => 'query', 'required' => false], ['name' => 'validation', 'in' => 'query', 'required' => false]]],
        'retrieveSslByDomainSubscriptionReseller' => ['method' => 'GET', 'path' => '/v2/certificates/subscription/{guid}', 'params' => [['name' => 'guid', 'in' => 'path', 'required' => true], ['name' => 'pageSize', 'in' => 'query', 'required' => false], ['name' => 'page', 'in' => 'query', 'required' => false], ['name' => 'domain', 'in' => 'query', 'required' => false], ['name' => 'status', 'in' => 'query', 'required' => false], ['name' => 'type', 'in' => 'query', 'required' => false], ['name' => 'validation', 'in' => 'query', 'required' => false]]],
    ];

    public function __construct(\ZPMLabs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }
}
