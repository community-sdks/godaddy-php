# Certificates Service

This document covers the Certificates service in the GoDaddy PHP SDK. It wraps the **GoDaddy API** endpoints from the provided Swagger file.

Client accessor: ``$client->certificates()``

## certificate_create

Create a pending order for certificate

- HTTP method: ``POST``
- Path: ``/v1/certificates``
- Swagger operationId: ``certificate_create``

### Input

```php
$response = $client->certificates()->certificate_create(
    certificateCreate: ['sample'],
    xMarketId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/certificates",
  "summary": "Create a pending order for certificate",
  "data": {}
}
```

## certificate_validate

Validate a pending order for certificate

- HTTP method: ``POST``
- Path: ``/v1/certificates/validate``
- Swagger operationId: ``certificate_validate``

### Input

```php
$response = $client->certificates()->certificate_validate(
    certificateCreate: ['sample'],
    xMarketId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/certificates/validate",
  "summary": "Validate a pending order for certificate",
  "data": {}
}
```

## certificate_get

Retrieve certificate details

- HTTP method: ``GET``
- Path: ``/v1/certificates/{certificateId}``
- Swagger operationId: ``certificate_get``

### Input

```php
$response = $client->certificates()->certificate_get(
    certificateId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/certificates/{certificateId}",
  "summary": "Retrieve certificate details",
  "data": {}
}
```

## certificate_action_retrieve

Retrieve all certificate actions

- HTTP method: ``GET``
- Path: ``/v1/certificates/{certificateId}/actions``
- Swagger operationId: ``certificate_action_retrieve``

### Input

```php
$response = $client->certificates()->certificate_action_retrieve(
    certificateId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/certificates/{certificateId}/actions",
  "summary": "Retrieve all certificate actions",
  "data": {}
}
```

## certificate_resend_email

Resend an email

- HTTP method: ``POST``
- Path: ``/v1/certificates/{certificateId}/email/{emailId}/resend``
- Swagger operationId: ``certificate_resend_email``

### Input

```php
$response = $client->certificates()->certificate_resend_email(
    certificateId: 'sample',
    emailId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/certificates/{certificateId}/email/{emailId}/resend",
  "summary": "Resend an email",
  "data": {}
}
```

## certificate_alternate_email_address

Add alternate email address

- HTTP method: ``POST``
- Path: ``/v1/certificates/{certificateId}/email/resend/{emailAddress}``
- Swagger operationId: ``certificate_alternate_email_address``

### Input

```php
$response = $client->certificates()->certificate_alternate_email_address(
    certificateId: 'sample',
    emailAddress: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/certificates/{certificateId}/email/resend/{emailAddress}",
  "summary": "Add alternate email address",
  "data": {}
}
```

## certificate_resend_email_address

Resend email to email address

- HTTP method: ``POST``
- Path: ``/v1/certificates/{certificateId}/email/{emailId}/resend/{emailAddress}``
- Swagger operationId: ``certificate_resend_email_address``

### Input

```php
$response = $client->certificates()->certificate_resend_email_address(
    certificateId: 'sample',
    emailId: 'sample',
    emailAddress: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/certificates/{certificateId}/email/{emailId}/resend/{emailAddress}",
  "summary": "Resend email to email address",
  "data": {}
}
```

## certificate_email_history

Retrieve email history

- HTTP method: ``GET``
- Path: ``/v1/certificates/{certificateId}/email/history``
- Swagger operationId: ``certificate_email_history``

### Input

```php
$response = $client->certificates()->certificate_email_history(
    certificateId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/certificates/{certificateId}/email/history",
  "summary": "Retrieve email history",
  "data": {}
}
```

## certificate_callback_delete

Unregister system callback

- HTTP method: ``DELETE``
- Path: ``/v1/certificates/{certificateId}/callback``
- Swagger operationId: ``certificate_callback_delete``

### Input

```php
$response = $client->certificates()->certificate_callback_delete(
    certificateId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "DELETE",
  "path": "/v1/certificates/{certificateId}/callback",
  "summary": "Unregister system callback",
  "data": {}
}
```

## certificate_callback_get

Retrieve system stateful action callback url

- HTTP method: ``GET``
- Path: ``/v1/certificates/{certificateId}/callback``
- Swagger operationId: ``certificate_callback_get``

### Input

```php
$response = $client->certificates()->certificate_callback_get(
    certificateId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/certificates/{certificateId}/callback",
  "summary": "Retrieve system stateful action callback url",
  "data": {}
}
```

## certificate_callback_replace

Register of certificate action callback

- HTTP method: ``PUT``
- Path: ``/v1/certificates/{certificateId}/callback``
- Swagger operationId: ``certificate_callback_replace``

### Input

```php
$response = $client->certificates()->certificate_callback_replace(
    certificateId: 'sample',
    callbackUrl: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "PUT",
  "path": "/v1/certificates/{certificateId}/callback",
  "summary": "Register of certificate action callback",
  "data": {}
}
```

## certificate_cancel

Cancel a pending certificate

- HTTP method: ``POST``
- Path: ``/v1/certificates/{certificateId}/cancel``
- Swagger operationId: ``certificate_cancel``

### Input

```php
$response = $client->certificates()->certificate_cancel(
    certificateId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/certificates/{certificateId}/cancel",
  "summary": "Cancel a pending certificate",
  "data": {}
}
```

## certificate_download

Download certificate

- HTTP method: ``GET``
- Path: ``/v1/certificates/{certificateId}/download``
- Swagger operationId: ``certificate_download``

### Input

```php
$response = $client->certificates()->certificate_download(
    certificateId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/certificates/{certificateId}/download",
  "summary": "Download certificate",
  "data": {}
}
```

## certificate_reissue

Reissue active certificate

- HTTP method: ``POST``
- Path: ``/v1/certificates/{certificateId}/reissue``
- Swagger operationId: ``certificate_reissue``

### Input

```php
$response = $client->certificates()->certificate_reissue(
    certificateId: 'sample',
    reissueCreate: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/certificates/{certificateId}/reissue",
  "summary": "Reissue active certificate",
  "data": {}
}
```

## certificate_renew

Renew active certificate

- HTTP method: ``POST``
- Path: ``/v1/certificates/{certificateId}/renew``
- Swagger operationId: ``certificate_renew``

### Input

```php
$response = $client->certificates()->certificate_renew(
    certificateId: 'sample',
    renewCreate: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/certificates/{certificateId}/renew",
  "summary": "Renew active certificate",
  "data": {}
}
```

## certificate_revoke

Revoke active certificate

- HTTP method: ``POST``
- Path: ``/v1/certificates/{certificateId}/revoke``
- Swagger operationId: ``certificate_revoke``

### Input

```php
$response = $client->certificates()->certificate_revoke(
    certificateId: 'sample',
    certificateRevoke: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/certificates/{certificateId}/revoke",
  "summary": "Revoke active certificate",
  "data": {}
}
```

## certificate_siteseal_get

Get Site seal

- HTTP method: ``GET``
- Path: ``/v1/certificates/{certificateId}/siteSeal``
- Swagger operationId: ``certificate_siteseal_get``

### Input

```php
$response = $client->certificates()->certificate_siteseal_get(
    certificateId: 'sample',
    theme: 'sample',
    locale: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/certificates/{certificateId}/siteSeal",
  "summary": "Get Site seal",
  "data": {}
}
```

## certificate_verifydomaincontrol

Check Domain Control

- HTTP method: ``POST``
- Path: ``/v1/certificates/{certificateId}/verifyDomainControl``
- Swagger operationId: ``certificate_verifydomaincontrol``

### Input

```php
$response = $client->certificates()->certificate_verifydomaincontrol(
    certificateId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/certificates/{certificateId}/verifyDomainControl",
  "summary": "Check Domain Control",
  "data": {}
}
```

## certificate_get_entitlement

Search for certificate details by entitlement

- HTTP method: ``GET``
- Path: ``/v2/certificates``
- Swagger operationId: ``certificate_get_entitlement``

### Input

```php
$response = $client->certificates()->certificate_get_entitlement(
    entitlementId: 'sample',
    latest: true,
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/certificates",
  "summary": "Search for certificate details by entitlement",
  "data": {}
}
```

## certificate_create_v2

Create a pending order for certificate

- HTTP method: ``POST``
- Path: ``/v2/certificates``
- Swagger operationId: ``certificate_create``

### Input

```php
$response = $client->certificates()->certificate_create_v2(
    subscriptionCertificateCreate: ['sample'],
    xMarketId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/certificates",
  "summary": "Create a pending order for certificate",
  "data": {}
}
```

## certificate_download_entitlement

Download certificate by entitlement

- HTTP method: ``GET``
- Path: ``/v2/certificates/download``
- Swagger operationId: ``certificate_download_entitlement``

### Input

```php
$response = $client->certificates()->certificate_download_entitlement(
    entitlementId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/certificates/download",
  "summary": "Download certificate by entitlement",
  "data": {}
}
```

## getCustomerCertificatesByCustomerId

Retrieve customer's certificates

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/certificates``
- Swagger operationId: ``getCustomerCertificatesByCustomerId``

### Input

```php
$response = $client->certificates()->getCustomerCertificatesByCustomerId(
    customerId: 'sample',
    offset: 1,
    limit: 1,
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/certificates",
  "summary": "Retrieve customer's certificates",
  "data": {}
}
```

## getCertificateDetailByCertIdentifier

Retrieve individual certificate details

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/certificates/{certificateId}``
- Swagger operationId: ``getCertificateDetailByCertIdentifier``

### Input

```php
$response = $client->certificates()->getCertificateDetailByCertIdentifier(
    customerId: 'sample',
    certificateId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/certificates/{certificateId}",
  "summary": "Retrieve individual certificate details",
  "data": {}
}
```

## getDomainInformationByCertificateId

Retrieve domain verification status

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/certificates/{certificateId}/domainVerifications``
- Swagger operationId: ``getDomainInformationByCertificateId``

### Input

```php
$response = $client->certificates()->getDomainInformationByCertificateId(
    customerId: 'sample',
    certificateId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/certificates/{certificateId}/domainVerifications",
  "summary": "Retrieve domain verification status",
  "data": {}
}
```

## getDomainDetailsByDomain

Retrieve detailed information for supplied domain

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/certificates/{certificateId}/domainVerifications/{domain}``
- Swagger operationId: ``getDomainDetailsByDomain``

### Input

```php
$response = $client->certificates()->getDomainDetailsByDomain(
    customerId: 'sample',
    certificateId: 'sample',
    domain: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/certificates/{certificateId}/domainVerifications/{domain}",
  "summary": "Retrieve detailed information for supplied domain",
  "data": {}
}
```

## getAcmeExternalAccountBinding

Retrieves the external account binding for the specified customer

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/certificates/acme/externalAccountBinding``
- Swagger operationId: ``getAcmeExternalAccountBinding``

### Input

```php
$response = $client->certificates()->getAcmeExternalAccountBinding(
    customerId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/certificates/acme/externalAccountBinding",
  "summary": "Retrieves the external account binding for the specified customer",
  "data": {}
}
```

## retrieveSslByDomainReseller

Get a page of subscriptions by domain

- HTTP method: ``GET``
- Path: ``/v2/certificates/subscriptions/search``
- Swagger operationId: ``retrieveSslByDomainReseller``

### Input

```php
$response = $client->certificates()->retrieveSslByDomainReseller(
    pageSize: 1,
    page: 1,
    domain: 'sample',
    status: 'sample',
    type: 'sample',
    validation: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/certificates/subscriptions/search",
  "summary": "Get a page of subscriptions by domain",
  "data": {}
}
```

## retrieveSslByDomainSubscriptionReseller

GET a page of certificates for a specific domain product

- HTTP method: ``GET``
- Path: ``/v2/certificates/subscription/{guid}``
- Swagger operationId: ``retrieveSslByDomainSubscriptionReseller``

### Input

```php
$response = $client->certificates()->retrieveSslByDomainSubscriptionReseller(
    guid: 'sample',
    pageSize: 1,
    page: 1,
    domain: 'sample',
    status: 'sample',
    type: 'sample',
    validation: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/certificates/subscription/{guid}",
  "summary": "GET a page of certificates for a specific domain product",
  "data": {}
}
```

