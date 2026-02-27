<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

final class DomainsService extends AbstractService
{
    public const BASE_URL = 'https://api.ote-godaddy.com';

    public function __construct(\CommunitySDKs\GoDaddy\ApiClient $client)
    {
        parent::__construct($client, self::BASE_URL);
    }

    public function list(?string $xShopperId = null, ?array $statuses = null, ?array $statusGroups = null, ?int $limit = null, ?string $marker = null, ?array $includes = null, ?string $modifiedDate = null): mixed
    {
        return $this->call('GET', '/v1/domains', queryParams: compact('statuses', 'statusGroups', 'limit', 'marker', 'includes', 'modifiedDate'), headers: ['X-Shopper-Id' => $xShopperId]);
    }

    public function getAgreement(array $tlds, bool $privacy, ?string $xMarketId = null, ?bool $forTransfer = null): mixed
    {
        return $this->call('GET', '/v1/domains/agreements', queryParams: compact('tlds', 'privacy', 'forTransfer'), headers: ['X-Market-Id' => $xMarketId]);
    }

    public function available(string $domain, ?string $checkType = null, ?bool $forTransfer = null): mixed
    {
        return $this->call('GET', '/v1/domains/available', queryParams: compact('domain', 'checkType', 'forTransfer'));
    }

    public function availableBulk(array $domains, ?string $checkType = null): mixed
    {
        return $this->call('POST', '/v1/domains/available', queryParams: compact('checkType'), body: $domains);
    }

    public function ContactsValidate(array $body, ?string $xPrivateLabelId = null, ?string $marketId = null): mixed
    {
        return $this->call('POST', '/v1/domains/contacts/validate', queryParams: compact('marketId'), headers: ['X-Private-Label-Id' => $xPrivateLabelId], body: $body);
    }

    public function purchase(array $body, ?string $xShopperId = null): mixed
    {
        return $this->call('POST', '/v1/domains/purchase', headers: ['X-Shopper-Id' => $xShopperId], body: $body);
    }

    public function schema(string $tld): mixed
    {
        return $this->call('GET', '/v1/domains/purchase/schema/{tld}', pathParams: compact('tld'));
    }

    public function validate(array $body): mixed
    {
        return $this->call('POST', '/v1/domains/purchase/validate', body: $body);
    }

    public function suggest(?string $xShopperId = null, ?string $query = null, ?string $country = null, ?string $city = null, ?array $sources = null, ?array $tlds = null, ?int $lengthMax = null, ?int $lengthMin = null, ?int $limit = null, ?int $waitMs = null): mixed
    {
        return $this->call('GET', '/v1/domains/suggest', queryParams: compact('query', 'country', 'city', 'sources', 'tlds', 'lengthMax', 'lengthMin', 'limit', 'waitMs'), headers: ['X-Shopper-Id' => $xShopperId]);
    }

    public function tlds(): mixed
    {
        return $this->call('GET', '/v1/domains/tlds');
    }

    public function cancel(string $domain): mixed
    {
        return $this->call('DELETE', '/v1/domains/{domain}', pathParams: compact('domain'));
    }

    public function get(string $domain, ?string $xShopperId = null): mixed
    {
        return $this->call('GET', '/v1/domains/{domain}', pathParams: compact('domain'), headers: ['X-Shopper-Id' => $xShopperId]);
    }

    public function update(string $domain, array $body, ?string $xShopperId = null): mixed
    {
        return $this->call('PATCH', '/v1/domains/{domain}', pathParams: compact('domain'), headers: ['X-Shopper-Id' => $xShopperId], body: $body);
    }

    public function updateContacts(string $domain, array $contacts, ?string $xShopperId = null): mixed
    {
        return $this->call('PATCH', '/v1/domains/{domain}/contacts', pathParams: compact('domain'), headers: ['X-Shopper-Id' => $xShopperId], body: $contacts);
    }

    public function cancelPrivacy(string $domain, ?string $xShopperId = null): mixed
    {
        return $this->call('DELETE', '/v1/domains/{domain}/privacy', pathParams: compact('domain'), headers: ['X-Shopper-Id' => $xShopperId]);
    }

    public function purchasePrivacy(string $domain, array $body, ?string $xShopperId = null): mixed
    {
        return $this->call('POST', '/v1/domains/{domain}/privacy/purchase', pathParams: compact('domain'), headers: ['X-Shopper-Id' => $xShopperId], body: $body);
    }

    public function recordAdd(string $domain, array $records, ?string $xShopperId = null): mixed
    {
        return $this->call('PATCH', '/v1/domains/{domain}/records', pathParams: compact('domain'), headers: ['X-Shopper-Id' => $xShopperId], body: $records);
    }

    public function recordReplace(string $domain, array $records, ?string $xShopperId = null): mixed
    {
        return $this->call('PUT', '/v1/domains/{domain}/records', pathParams: compact('domain'), headers: ['X-Shopper-Id' => $xShopperId], body: $records);
    }

    public function recordGet(string $domain, string $type, string $name, ?string $xShopperId = null, ?int $offset = null, ?int $limit = null): mixed
    {
        return $this->call('GET', '/v1/domains/{domain}/records/{type}/{name}', pathParams: compact('domain', 'type', 'name'), queryParams: compact('offset', 'limit'), headers: ['X-Shopper-Id' => $xShopperId]);
    }

    public function recordReplaceTypeName(string $domain, string $type, string $name, array $records, ?string $xShopperId = null): mixed
    {
        return $this->call('PUT', '/v1/domains/{domain}/records/{type}/{name}', pathParams: compact('domain', 'type', 'name'), headers: ['X-Shopper-Id' => $xShopperId], body: $records);
    }

    public function recordDeleteTypeName(string $domain, string $type, string $name, ?string $xShopperId = null): mixed
    {
        return $this->call('DELETE', '/v1/domains/{domain}/records/{type}/{name}', pathParams: compact('domain', 'type', 'name'), headers: ['X-Shopper-Id' => $xShopperId]);
    }

    public function recordReplaceType(string $domain, string $type, array $records, ?string $xShopperId = null): mixed
    {
        return $this->call('PUT', '/v1/domains/{domain}/records/{type}', pathParams: compact('domain', 'type'), headers: ['X-Shopper-Id' => $xShopperId], body: $records);
    }

    public function renew(string $domain, ?string $xShopperId = null, ?array $body = null): mixed
    {
        return $this->call('POST', '/v1/domains/{domain}/renew', pathParams: compact('domain'), headers: ['X-Shopper-Id' => $xShopperId], body: $body);
    }

    public function transferIn(string $domain, array $body, ?string $xShopperId = null): mixed
    {
        return $this->call('POST', '/v1/domains/{domain}/transfer', pathParams: compact('domain'), headers: ['X-Shopper-Id' => $xShopperId], body: $body);
    }

    public function verifyEmail(string $domain, ?string $xShopperId = null): mixed
    {
        return $this->call('POST', '/v1/domains/{domain}/verifyRegistrantEmail', pathParams: compact('domain'), headers: ['X-Shopper-Id' => $xShopperId]);
    }

    public function get__v2_customers_customerId_domains_domain(string $customerId, string $domain, ?string $xRequestId = null, ?array $includes = null): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/domains/{domain}', pathParams: compact('customerId', 'domain'), queryParams: compact('includes'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function delete__v2_customers_customerId_domains_domain_changeOfRegistrant(string $customerId, string $domain, ?string $xRequestId = null): mixed
    {
        return $this->call('DELETE', '/v2/customers/{customerId}/domains/{domain}/changeOfRegistrant', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function get__v2_customers_customerId_domains_domain_changeOfRegistrant(string $customerId, string $domain, ?string $xRequestId = null): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/domains/{domain}/changeOfRegistrant', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function patch__v2_customers_customerId_domains_domain_dnssecRecords(string $customerId, string $domain, array $body, ?string $xRequestId = null): mixed
    {
        return $this->call('PATCH', '/v2/customers/{customerId}/domains/{domain}/dnssecRecords', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function delete__v2_customers_customerId_domains_domain_dnssecRecords(string $customerId, string $domain, array $body, ?string $xRequestId = null): mixed
    {
        return $this->call('DELETE', '/v2/customers/{customerId}/domains/{domain}/dnssecRecords', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function put__v2_customers_customerId_domains_domain_nameServers(string $customerId, string $domain, array $body, ?string $xRequestId = null): mixed
    {
        return $this->call('PUT', '/v2/customers/{customerId}/domains/{domain}/nameServers', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function get__v2_customers_customerId_domains_domain_privacy_forwarding(string $customerId, string $domain, ?string $xRequestId = null): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/domains/{domain}/privacy/forwarding', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function patch__v2_customers_customerId_domains_domain_privacy_forwarding(string $customerId, string $domain, array $body, ?string $xRequestId = null): mixed
    {
        return $this->call('PATCH', '/v2/customers/{customerId}/domains/{domain}/privacy/forwarding', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function post__v2_customers_customerId_domains_domain_redeem(string $customerId, string $domain, ?string $xRequestId = null, ?array $body = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/{domain}/redeem', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function post__v2_customers_customerId_domains_domain_renew(string $customerId, string $domain, array $body, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/{domain}/renew', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function post__v2_customers_customerId_domains_domain_transfer(string $customerId, string $domain, array $body, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/{domain}/transfer', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function get__v2_customers_customerId_domains_domain_transfer(string $customerId, string $domain, ?string $xRequestId = null): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/domains/{domain}/transfer', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function post__v2_customers_customerId_domains_domain_transfer_validate(string $customerId, string $domain, array $body, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/{domain}/transfer/validate', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function post__v2_customers_customerId_domains_domain_transferInAccept(string $customerId, string $domain, array $body, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/{domain}/transferInAccept', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function post__v2_customers_customerId_domains_domain_transferInCancel(string $customerId, string $domain, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/{domain}/transferInCancel', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function post__v2_customers_customerId_domains_domain_transferInRestart(string $customerId, string $domain, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/{domain}/transferInRestart', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function post__v2_customers_customerId_domains_domain_transferInRetry(string $customerId, string $domain, array $body, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/{domain}/transferInRetry', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function post__v2_customers_customerId_domains_domain_transferOut(string $customerId, string $domain, string $registrar, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/{domain}/transferOut', pathParams: compact('customerId', 'domain'), queryParams: compact('registrar'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function post__v2_customers_customerId_domains_domain_transferOutAccept(string $customerId, string $domain, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/{domain}/transferOutAccept', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function post__v2_customers_customerId_domains_domain_transferOutReject(string $customerId, string $domain, ?string $xRequestId = null, ?string $reason = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/{domain}/transferOutReject', pathParams: compact('customerId', 'domain'), queryParams: compact('reason'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function domainsForwardsDelete(string $customerId, string $fqdn): mixed
    {
        return $this->call('DELETE', '/v2/customers/{customerId}/domains/forwards/{fqdn}', pathParams: compact('customerId', 'fqdn'));
    }

    public function domainsForwardsGet(string $customerId, string $fqdn, ?bool $includeSubs = null): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/domains/forwards/{fqdn}', pathParams: compact('customerId', 'fqdn'), queryParams: compact('includeSubs'));
    }

    public function domainsForwardsPut(string $customerId, string $fqdn, array $body): mixed
    {
        return $this->call('PUT', '/v2/customers/{customerId}/domains/forwards/{fqdn}', pathParams: compact('customerId', 'fqdn'), body: $body);
    }

    public function domainsForwardsPost(string $customerId, string $fqdn, array $body): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/forwards/{fqdn}', pathParams: compact('customerId', 'fqdn'), body: $body);
    }

    public function get__v2_customers_customerId_domains_domain_actions(string $customerId, string $domain, ?string $xRequestId = null): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/domains/{domain}/actions', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function delete__v2_customers_customerId_domains_domain_actions_type(string $customerId, string $domain, string $type, ?string $xRequestId = null): mixed
    {
        return $this->call('DELETE', '/v2/customers/{customerId}/domains/{domain}/actions/{type}', pathParams: compact('customerId', 'domain', 'type'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function get__v2_customers_customerId_domains_domain_actions_type(string $customerId, string $domain, string $type, ?string $xRequestId = null): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/domains/{domain}/actions/{type}', pathParams: compact('customerId', 'domain', 'type'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function get__v2_customers_customerId_domains_notifications(string $customerId, ?string $xRequestId = null): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/domains/notifications', pathParams: compact('customerId'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function get__v2_customers_customerId_domains_notifications_optIn(string $customerId, ?string $xRequestId = null): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/domains/notifications/optIn', pathParams: compact('customerId'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function put__v2_customers_customerId_domains_notifications_optIn(string $customerId, array $types, ?string $xRequestId = null): mixed
    {
        return $this->call('PUT', '/v2/customers/{customerId}/domains/notifications/optIn', pathParams: compact('customerId'), queryParams: compact('types'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function get__v2_customers_customerId_domains_notifications_schemas_type(string $customerId, string $type, ?string $xRequestId = null): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/domains/notifications/schemas/{type}', pathParams: compact('customerId', 'type'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function post__v2_customers_customerId_domains_notifications_notificationId_acknowledge(string $customerId, string $notificationId, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/notifications/{notificationId}/acknowledge', pathParams: compact('customerId', 'notificationId'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function post__v2_customers_customerId_domains_register(string $customerId, array $body, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/register', pathParams: compact('customerId'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function get__v2_customers_customerId_domains_register_schema_tld(string $customerId, string $tld, ?string $xRequestId = null): mixed
    {
        return $this->call('GET', '/v2/customers/{customerId}/domains/register/schema/{tld}', pathParams: compact('customerId', 'tld'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function post__v2_customers_customerId_domains_register_validate(string $customerId, array $body, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/register/validate', pathParams: compact('customerId'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function get__v2_domains_maintenances(?string $xRequestId = null, ?string $status = null, ?string $modifiedAtAfter = null, ?string $startsAtAfter = null, ?int $limit = null): mixed
    {
        return $this->call('GET', '/v2/domains/maintenances', queryParams: compact('status', 'modifiedAtAfter', 'startsAtAfter', 'limit'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function get__v2_domains_maintenances_maintenanceId(string $maintenanceId, ?string $xRequestId = null): mixed
    {
        return $this->call('GET', '/v2/domains/maintenances/{maintenanceId}', pathParams: compact('maintenanceId'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function get__v2_domains_usage_yyyymm(string $yyyymm, ?string $xRequestId = null, ?array $includes = null): mixed
    {
        return $this->call('GET', '/v2/domains/usage/{yyyymm}', pathParams: compact('yyyymm'), queryParams: compact('includes'), headers: ['X-Request-Id' => $xRequestId]);
    }

    public function patch__v2_customers_customerId_domains_domain_contacts(string $customerId, string $domain, array $body, ?string $xRequestId = null): mixed
    {
        return $this->call('PATCH', '/v2/customers/{customerId}/domains/{domain}/contacts', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId], body: $body);
    }

    public function post__v2_customers_customerId_domains_domain_regenerateAuthCode(string $customerId, string $domain, ?string $xRequestId = null): mixed
    {
        return $this->call('POST', '/v2/customers/{customerId}/domains/{domain}/regenerateAuthCode', pathParams: compact('customerId', 'domain'), headers: ['X-Request-Id' => $xRequestId]);
    }
}
