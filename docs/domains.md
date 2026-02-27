# Domains Service

This document covers the Domains service in the GoDaddy PHP SDK. It wraps the **Domains API** endpoints from the provided Swagger file.

Client accessor: ``$client->domains()``

## list

Retrieve a list of Domains for the specified Shopper

- HTTP method: ``GET``
- Path: ``/v1/domains``
- Swagger operationId: ``list``

### Input

```php
$response = $client->domains()->list(
    xShopperId: 'header-value',
    statuses: ['sample'],
    statusGroups: ['sample'],
    limit: 1,
    marker: 'sample',
    includes: ['sample'],
    modifiedDate: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/domains",
  "summary": "Retrieve a list of Domains for the specified Shopper",
  "data": {}
}
```

## getAgreement

Retrieve the legal agreement(s) required to purchase the specified TLD and add-ons

- HTTP method: ``GET``
- Path: ``/v1/domains/agreements``
- Swagger operationId: ``getAgreement``

### Input

```php
$response = $client->domains()->getAgreement(
    tlds: ['sample'],
    privacy: true,
    xMarketId: 'header-value',
    forTransfer: true,
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/domains/agreements",
  "summary": "Retrieve the legal agreement(s) required to purchase the specified TLD and add-ons",
  "data": {}
}
```

## available

Determine whether or not the specified domain is available for purchase

- HTTP method: ``GET``
- Path: ``/v1/domains/available``
- Swagger operationId: ``available``

### Input

```php
$response = $client->domains()->available(
    domain: 'sample',
    checkType: 'sample',
    forTransfer: true,
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/domains/available",
  "summary": "Determine whether or not the specified domain is available for purchase",
  "data": {}
}
```

## availableBulk

Determine whether or not the specified domains are available for purchase

- HTTP method: ``POST``
- Path: ``/v1/domains/available``
- Swagger operationId: ``availableBulk``

### Input

```php
$response = $client->domains()->availableBulk(
    domains: ['sample'],
    checkType: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/domains/available",
  "summary": "Determine whether or not the specified domains are available for purchase",
  "data": {}
}
```

## ContactsValidate

Validate the request body using the Domain Contact Validation Schema for specified domains.

- HTTP method: ``POST``
- Path: ``/v1/domains/contacts/validate``
- Swagger operationId: ``ContactsValidate``

### Input

```php
$response = $client->domains()->ContactsValidate(
    body: ['sample'],
    xPrivateLabelId: 'header-value',
    marketId: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/domains/contacts/validate",
  "summary": "Validate the request body using the Domain Contact Validation Schema for specified domains.",
  "data": {}
}
```

## purchase

Purchase and register the specified Domain

- HTTP method: ``POST``
- Path: ``/v1/domains/purchase``
- Swagger operationId: ``purchase``

### Input

```php
$response = $client->domains()->purchase(
    body: ['sample'],
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/domains/purchase",
  "summary": "Purchase and register the specified Domain",
  "data": {}
}
```

## schema

Retrieve the schema to be submitted when registering a Domain for the specified TLD

- HTTP method: ``GET``
- Path: ``/v1/domains/purchase/schema/{tld}``
- Swagger operationId: ``schema``

### Input

```php
$response = $client->domains()->schema(
    tld: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/domains/purchase/schema/{tld}",
  "summary": "Retrieve the schema to be submitted when registering a Domain for the specified TLD",
  "data": {}
}
```

## validate

Validate the request body using the Domain Purchase Schema for the specified TLD

- HTTP method: ``POST``
- Path: ``/v1/domains/purchase/validate``
- Swagger operationId: ``validate``

### Input

```php
$response = $client->domains()->validate(
    body: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/domains/purchase/validate",
  "summary": "Validate the request body using the Domain Purchase Schema for the specified TLD",
  "data": {}
}
```

## suggest

Suggest alternate Domain names based on a seed Domain, a set of keywords, or the shopper's purchase history

- HTTP method: ``GET``
- Path: ``/v1/domains/suggest``
- Swagger operationId: ``suggest``

### Input

```php
$response = $client->domains()->suggest(
    xShopperId: 'header-value',
    query: 'sample',
    country: 'sample',
    city: 'sample',
    sources: ['sample'],
    tlds: ['sample'],
    lengthMax: 1,
    lengthMin: 1,
    limit: 1,
    waitMs: 1,
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/domains/suggest",
  "summary": "Suggest alternate Domain names based on a seed Domain, a set of keywords, or the shopper's purchase history",
  "data": {}
}
```

## tlds

Retrieves a list of TLDs supported and enabled for sale

- HTTP method: ``GET``
- Path: ``/v1/domains/tlds``
- Swagger operationId: ``tlds``

### Input

```php
$response = $client->domains()->tlds();
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/domains/tlds",
  "summary": "Retrieves a list of TLDs supported and enabled for sale",
  "data": {}
}
```

## cancel

Cancel a purchased domain

- HTTP method: ``DELETE``
- Path: ``/v1/domains/{domain}``
- Swagger operationId: ``cancel``

### Input

```php
$response = $client->domains()->cancel(
    domain: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "DELETE",
  "path": "/v1/domains/{domain}",
  "summary": "Cancel a purchased domain",
  "data": {}
}
```

## get

Retrieve details for the specified Domain

- HTTP method: ``GET``
- Path: ``/v1/domains/{domain}``
- Swagger operationId: ``get``

### Input

```php
$response = $client->domains()->get(
    domain: 'sample',
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/domains/{domain}",
  "summary": "Retrieve details for the specified Domain",
  "data": {}
}
```

## update

Update details for the specified Domain

- HTTP method: ``PATCH``
- Path: ``/v1/domains/{domain}``
- Swagger operationId: ``update``

### Input

```php
$response = $client->domains()->update(
    domain: 'sample',
    body: ['sample'],
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "PATCH",
  "path": "/v1/domains/{domain}",
  "summary": "Update details for the specified Domain",
  "data": {}
}
```

## updateContacts

Update domain

- HTTP method: ``PATCH``
- Path: ``/v1/domains/{domain}/contacts``
- Swagger operationId: ``updateContacts``

### Input

```php
$response = $client->domains()->updateContacts(
    domain: 'sample',
    contacts: ['sample'],
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "PATCH",
  "path": "/v1/domains/{domain}/contacts",
  "summary": "Update domain",
  "data": {}
}
```

## cancelPrivacy

Submit a privacy cancellation request for the given domain

- HTTP method: ``DELETE``
- Path: ``/v1/domains/{domain}/privacy``
- Swagger operationId: ``cancelPrivacy``

### Input

```php
$response = $client->domains()->cancelPrivacy(
    domain: 'sample',
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "DELETE",
  "path": "/v1/domains/{domain}/privacy",
  "summary": "Submit a privacy cancellation request for the given domain",
  "data": {}
}
```

## purchasePrivacy

Purchase privacy for a specified domain

- HTTP method: ``POST``
- Path: ``/v1/domains/{domain}/privacy/purchase``
- Swagger operationId: ``purchasePrivacy``

### Input

```php
$response = $client->domains()->purchasePrivacy(
    domain: 'sample',
    body: ['sample'],
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/domains/{domain}/privacy/purchase",
  "summary": "Purchase privacy for a specified domain",
  "data": {}
}
```

## recordAdd

Add the specified DNS Records to the specified Domain

- HTTP method: ``PATCH``
- Path: ``/v1/domains/{domain}/records``
- Swagger operationId: ``recordAdd``

### Input

```php
$response = $client->domains()->recordAdd(
    domain: 'sample',
    records: ['sample'],
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "PATCH",
  "path": "/v1/domains/{domain}/records",
  "summary": "Add the specified DNS Records to the specified Domain",
  "data": {}
}
```

## recordReplace

Replace all DNS Records for the specified Domain

- HTTP method: ``PUT``
- Path: ``/v1/domains/{domain}/records``
- Swagger operationId: ``recordReplace``

### Input

```php
$response = $client->domains()->recordReplace(
    domain: 'sample',
    records: ['sample'],
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "PUT",
  "path": "/v1/domains/{domain}/records",
  "summary": "Replace all DNS Records for the specified Domain",
  "data": {}
}
```

## recordGet

Retrieve DNS Records for the specified Domain, optionally with the specified Type and/or Name

- HTTP method: ``GET``
- Path: ``/v1/domains/{domain}/records/{type}/{name}``
- Swagger operationId: ``recordGet``

### Input

```php
$response = $client->domains()->recordGet(
    domain: 'sample',
    type: 'sample',
    name: 'sample',
    xShopperId: 'header-value',
    offset: 1,
    limit: 1,
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v1/domains/{domain}/records/{type}/{name}",
  "summary": "Retrieve DNS Records for the specified Domain, optionally with the specified Type and/or Name",
  "data": {}
}
```

## recordReplaceTypeName

Replace all DNS Records for the specified Domain with the specified Type and Name

- HTTP method: ``PUT``
- Path: ``/v1/domains/{domain}/records/{type}/{name}``
- Swagger operationId: ``recordReplaceTypeName``

### Input

```php
$response = $client->domains()->recordReplaceTypeName(
    domain: 'sample',
    type: 'sample',
    name: 'sample',
    records: ['sample'],
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "PUT",
  "path": "/v1/domains/{domain}/records/{type}/{name}",
  "summary": "Replace all DNS Records for the specified Domain with the specified Type and Name",
  "data": {}
}
```

## recordDeleteTypeName

Delete all DNS Records for the specified Domain with the specified Type and Name

- HTTP method: ``DELETE``
- Path: ``/v1/domains/{domain}/records/{type}/{name}``
- Swagger operationId: ``recordDeleteTypeName``

### Input

```php
$response = $client->domains()->recordDeleteTypeName(
    domain: 'sample',
    type: 'sample',
    name: 'sample',
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "DELETE",
  "path": "/v1/domains/{domain}/records/{type}/{name}",
  "summary": "Delete all DNS Records for the specified Domain with the specified Type and Name",
  "data": {}
}
```

## recordReplaceType

Replace all DNS Records for the specified Domain with the specified Type

- HTTP method: ``PUT``
- Path: ``/v1/domains/{domain}/records/{type}``
- Swagger operationId: ``recordReplaceType``

### Input

```php
$response = $client->domains()->recordReplaceType(
    domain: 'sample',
    type: 'sample',
    records: ['sample'],
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "PUT",
  "path": "/v1/domains/{domain}/records/{type}",
  "summary": "Replace all DNS Records for the specified Domain with the specified Type",
  "data": {}
}
```

## renew

Renew the specified Domain

- HTTP method: ``POST``
- Path: ``/v1/domains/{domain}/renew``
- Swagger operationId: ``renew``

### Input

```php
$response = $client->domains()->renew(
    domain: 'sample',
    xShopperId: 'header-value',
    body: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/domains/{domain}/renew",
  "summary": "Renew the specified Domain",
  "data": {}
}
```

## transferIn

Purchase and start or restart transfer process

- HTTP method: ``POST``
- Path: ``/v1/domains/{domain}/transfer``
- Swagger operationId: ``transferIn``

### Input

```php
$response = $client->domains()->transferIn(
    domain: 'sample',
    body: ['sample'],
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/domains/{domain}/transfer",
  "summary": "Purchase and start or restart transfer process",
  "data": {}
}
```

## verifyEmail

Re-send Contact E-mail Verification for specified Domain

- HTTP method: ``POST``
- Path: ``/v1/domains/{domain}/verifyRegistrantEmail``
- Swagger operationId: ``verifyEmail``

### Input

```php
$response = $client->domains()->verifyEmail(
    domain: 'sample',
    xShopperId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/domains/{domain}/verifyRegistrantEmail",
  "summary": "Re-send Contact E-mail Verification for specified Domain",
  "data": {}
}
```

## get__v2_customers_customerId_domains_domain

Retrieve details for the specified Domain

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/domains/{domain}``

### Input

```php
$response = $client->domains()->get__v2_customers_customerId_domains_domain(
    customerId: 'sample',
    domain: 'sample',
    xRequestId: 'header-value',
    includes: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/domains/{domain}",
  "summary": "Retrieve details for the specified Domain",
  "data": {}
}
```

## delete__v2_customers_customerId_domains_domain_changeOfRegistrant

Cancels a pending change of registrant request for a given domain

- HTTP method: ``DELETE``
- Path: ``/v2/customers/{customerId}/domains/{domain}/changeOfRegistrant``

### Input

```php
$response = $client->domains()->delete__v2_customers_customerId_domains_domain_changeOfRegistrant(
    customerId: 'sample',
    domain: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "DELETE",
  "path": "/v2/customers/{customerId}/domains/{domain}/changeOfRegistrant",
  "summary": "Cancels a pending change of registrant request for a given domain",
  "data": {}
}
```

## get__v2_customers_customerId_domains_domain_changeOfRegistrant

Retrieve change of registrant information

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/domains/{domain}/changeOfRegistrant``

### Input

```php
$response = $client->domains()->get__v2_customers_customerId_domains_domain_changeOfRegistrant(
    customerId: 'sample',
    domain: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/domains/{domain}/changeOfRegistrant",
  "summary": "Retrieve change of registrant information",
  "data": {}
}
```

## patch__v2_customers_customerId_domains_domain_dnssecRecords

Add the specifed DNSSEC records to the domain

- HTTP method: ``PATCH``
- Path: ``/v2/customers/{customerId}/domains/{domain}/dnssecRecords``

### Input

```php
$response = $client->domains()->patch__v2_customers_customerId_domains_domain_dnssecRecords(
    customerId: 'sample',
    domain: 'sample',
    body: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "PATCH",
  "path": "/v2/customers/{customerId}/domains/{domain}/dnssecRecords",
  "summary": "Add the specifed DNSSEC records to the domain",
  "data": {}
}
```

## delete__v2_customers_customerId_domains_domain_dnssecRecords

Remove the specifed DNSSEC record from the domain

- HTTP method: ``DELETE``
- Path: ``/v2/customers/{customerId}/domains/{domain}/dnssecRecords``

### Input

```php
$response = $client->domains()->delete__v2_customers_customerId_domains_domain_dnssecRecords(
    customerId: 'sample',
    domain: 'sample',
    body: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "DELETE",
  "path": "/v2/customers/{customerId}/domains/{domain}/dnssecRecords",
  "summary": "Remove the specifed DNSSEC record from the domain",
  "data": {}
}
```

## put__v2_customers_customerId_domains_domain_nameServers

Replaces the existing name servers on the domain.

- HTTP method: ``PUT``
- Path: ``/v2/customers/{customerId}/domains/{domain}/nameServers``

### Input

```php
$response = $client->domains()->put__v2_customers_customerId_domains_domain_nameServers(
    customerId: 'sample',
    domain: 'sample',
    body: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "PUT",
  "path": "/v2/customers/{customerId}/domains/{domain}/nameServers",
  "summary": "Replaces the existing name servers on the domain.",
  "data": {}
}
```

## get__v2_customers_customerId_domains_domain_privacy_forwarding

Retrieve privacy email forwarding settings showing where emails are delivered

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/domains/{domain}/privacy/forwarding``

### Input

```php
$response = $client->domains()->get__v2_customers_customerId_domains_domain_privacy_forwarding(
    customerId: 'sample',
    domain: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/domains/{domain}/privacy/forwarding",
  "summary": "Retrieve privacy email forwarding settings showing where emails are delivered",
  "data": {}
}
```

## patch__v2_customers_customerId_domains_domain_privacy_forwarding

Update privacy email forwarding settings to determine how emails are delivered

- HTTP method: ``PATCH``
- Path: ``/v2/customers/{customerId}/domains/{domain}/privacy/forwarding``

### Input

```php
$response = $client->domains()->patch__v2_customers_customerId_domains_domain_privacy_forwarding(
    customerId: 'sample',
    domain: 'sample',
    body: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "PATCH",
  "path": "/v2/customers/{customerId}/domains/{domain}/privacy/forwarding",
  "summary": "Update privacy email forwarding settings to determine how emails are delivered",
  "data": {}
}
```

## post__v2_customers_customerId_domains_domain_redeem

Purchase a restore for the given domain to bring it out of redemption

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/{domain}/redeem``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_domain_redeem(
    customerId: 'sample',
    domain: 'sample',
    xRequestId: 'header-value',
    body: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/{domain}/redeem",
  "summary": "Purchase a restore for the given domain to bring it out of redemption",
  "data": {}
}
```

## post__v2_customers_customerId_domains_domain_renew

Renew the specified Domain

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/{domain}/renew``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_domain_renew(
    customerId: 'sample',
    domain: 'sample',
    body: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/{domain}/renew",
  "summary": "Renew the specified Domain",
  "data": {}
}
```

## post__v2_customers_customerId_domains_domain_transfer

Purchase and start or restart transfer process

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/{domain}/transfer``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_domain_transfer(
    customerId: 'sample',
    domain: 'sample',
    body: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/{domain}/transfer",
  "summary": "Purchase and start or restart transfer process",
  "data": {}
}
```

## get__v2_customers_customerId_domains_domain_transfer

Query the current transfer status

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/domains/{domain}/transfer``

### Input

```php
$response = $client->domains()->get__v2_customers_customerId_domains_domain_transfer(
    customerId: 'sample',
    domain: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/domains/{domain}/transfer",
  "summary": "Query the current transfer status",
  "data": {}
}
```

## post__v2_customers_customerId_domains_domain_transfer_validate

Validate the request body using the Domain Transfer Schema for the specified TLD

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/{domain}/transfer/validate``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_domain_transfer_validate(
    customerId: 'sample',
    domain: 'sample',
    body: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/{domain}/transfer/validate",
  "summary": "Validate the request body using the Domain Transfer Schema for the specified TLD",
  "data": {}
}
```

## post__v2_customers_customerId_domains_domain_transferInAccept

Accepts the transfer in

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/{domain}/transferInAccept``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_domain_transferInAccept(
    customerId: 'sample',
    domain: 'sample',
    body: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/{domain}/transferInAccept",
  "summary": "Accepts the transfer in",
  "data": {}
}
```

## post__v2_customers_customerId_domains_domain_transferInCancel

Cancels the transfer in

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/{domain}/transferInCancel``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_domain_transferInCancel(
    customerId: 'sample',
    domain: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/{domain}/transferInCancel",
  "summary": "Cancels the transfer in",
  "data": {}
}
```

## post__v2_customers_customerId_domains_domain_transferInRestart

Restarts transfer in request from the beginning

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/{domain}/transferInRestart``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_domain_transferInRestart(
    customerId: 'sample',
    domain: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/{domain}/transferInRestart",
  "summary": "Restarts transfer in request from the beginning",
  "data": {}
}
```

## post__v2_customers_customerId_domains_domain_transferInRetry

Retries the current transfer in request with supplied Authorization code

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/{domain}/transferInRetry``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_domain_transferInRetry(
    customerId: 'sample',
    domain: 'sample',
    body: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/{domain}/transferInRetry",
  "summary": "Retries the current transfer in request with supplied Authorization code",
  "data": {}
}
```

## post__v2_customers_customerId_domains_domain_transferOut

Initiate transfer out to another registrar for a .uk domain.

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/{domain}/transferOut``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_domain_transferOut(
    customerId: 'sample',
    domain: 'sample',
    registrar: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/{domain}/transferOut",
  "summary": "Initiate transfer out to another registrar for a .uk domain.",
  "data": {}
}
```

## post__v2_customers_customerId_domains_domain_transferOutAccept

Accept transfer out

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/{domain}/transferOutAccept``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_domain_transferOutAccept(
    customerId: 'sample',
    domain: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/{domain}/transferOutAccept",
  "summary": "Accept transfer out",
  "data": {}
}
```

## post__v2_customers_customerId_domains_domain_transferOutReject

Reject transfer out

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/{domain}/transferOutReject``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_domain_transferOutReject(
    customerId: 'sample',
    domain: 'sample',
    xRequestId: 'header-value',
    reason: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/{domain}/transferOutReject",
  "summary": "Reject transfer out",
  "data": {}
}
```

## domainsForwardsDelete

Submit a forwarding cancellation request for the given fqdn

- HTTP method: ``DELETE``
- Path: ``/v2/customers/{customerId}/domains/forwards/{fqdn}``
- Swagger operationId: ``domainsForwardsDelete``

### Input

```php
$response = $client->domains()->domainsForwardsDelete(
    customerId: 'sample',
    fqdn: 'sample',
);
```

### Output

```json
{
  "ok": true,
  "method": "DELETE",
  "path": "/v2/customers/{customerId}/domains/forwards/{fqdn}",
  "summary": "Submit a forwarding cancellation request for the given fqdn",
  "data": {}
}
```

## domainsForwardsGet

Retrieve the forwarding information for the given fqdn

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/domains/forwards/{fqdn}``
- Swagger operationId: ``domainsForwardsGet``

### Input

```php
$response = $client->domains()->domainsForwardsGet(
    customerId: 'sample',
    fqdn: 'sample',
    includeSubs: true,
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/domains/forwards/{fqdn}",
  "summary": "Retrieve the forwarding information for the given fqdn",
  "data": {}
}
```

## domainsForwardsPut

Modify the forwarding information for the given fqdn

- HTTP method: ``PUT``
- Path: ``/v2/customers/{customerId}/domains/forwards/{fqdn}``
- Swagger operationId: ``domainsForwardsPut``

### Input

```php
$response = $client->domains()->domainsForwardsPut(
    customerId: 'sample',
    fqdn: 'sample',
    body: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "PUT",
  "path": "/v2/customers/{customerId}/domains/forwards/{fqdn}",
  "summary": "Modify the forwarding information for the given fqdn",
  "data": {}
}
```

## domainsForwardsPost

Create a new forwarding configuration for the given FQDN

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/forwards/{fqdn}``
- Swagger operationId: ``domainsForwardsPost``

### Input

```php
$response = $client->domains()->domainsForwardsPost(
    customerId: 'sample',
    fqdn: 'sample',
    body: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/forwards/{fqdn}",
  "summary": "Create a new forwarding configuration for the given FQDN",
  "data": {}
}
```

## get__v2_customers_customerId_domains_domain_actions

Retrieves a list of the most recent actions for the specified domain

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/domains/{domain}/actions``

### Input

```php
$response = $client->domains()->get__v2_customers_customerId_domains_domain_actions(
    customerId: 'sample',
    domain: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/domains/{domain}/actions",
  "summary": "Retrieves a list of the most recent actions for the specified domain",
  "data": {}
}
```

## delete__v2_customers_customerId_domains_domain_actions_type

Cancel the most recent user action for the specified domain

- HTTP method: ``DELETE``
- Path: ``/v2/customers/{customerId}/domains/{domain}/actions/{type}``

### Input

```php
$response = $client->domains()->delete__v2_customers_customerId_domains_domain_actions_type(
    customerId: 'sample',
    domain: 'sample',
    type: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "DELETE",
  "path": "/v2/customers/{customerId}/domains/{domain}/actions/{type}",
  "summary": "Cancel the most recent user action for the specified domain",
  "data": {}
}
```

## get__v2_customers_customerId_domains_domain_actions_type

Retrieves the most recent action for the specified domain

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/domains/{domain}/actions/{type}``

### Input

```php
$response = $client->domains()->get__v2_customers_customerId_domains_domain_actions_type(
    customerId: 'sample',
    domain: 'sample',
    type: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/domains/{domain}/actions/{type}",
  "summary": "Retrieves the most recent action for the specified domain",
  "data": {}
}
```

## get__v2_customers_customerId_domains_notifications

Retrieve the next domain notification

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/domains/notifications``

### Input

```php
$response = $client->domains()->get__v2_customers_customerId_domains_notifications(
    customerId: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/domains/notifications",
  "summary": "Retrieve the next domain notification",
  "data": {}
}
```

## get__v2_customers_customerId_domains_notifications_optIn

Retrieve a list of notification types that are opted in

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/domains/notifications/optIn``

### Input

```php
$response = $client->domains()->get__v2_customers_customerId_domains_notifications_optIn(
    customerId: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/domains/notifications/optIn",
  "summary": "Retrieve a list of notification types that are opted in",
  "data": {}
}
```

## put__v2_customers_customerId_domains_notifications_optIn

Opt in to recieve notifications for the submitted notification types

- HTTP method: ``PUT``
- Path: ``/v2/customers/{customerId}/domains/notifications/optIn``

### Input

```php
$response = $client->domains()->put__v2_customers_customerId_domains_notifications_optIn(
    customerId: 'sample',
    types: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "PUT",
  "path": "/v2/customers/{customerId}/domains/notifications/optIn",
  "summary": "Opt in to recieve notifications for the submitted notification types",
  "data": {}
}
```

## get__v2_customers_customerId_domains_notifications_schemas_type

Retrieve the schema for the notification data for the specified notification type

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/domains/notifications/schemas/{type}``

### Input

```php
$response = $client->domains()->get__v2_customers_customerId_domains_notifications_schemas_type(
    customerId: 'sample',
    type: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/domains/notifications/schemas/{type}",
  "summary": "Retrieve the schema for the notification data for the specified notification type",
  "data": {}
}
```

## post__v2_customers_customerId_domains_notifications_notificationId_acknowledge

Acknowledge a domain notification

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/notifications/{notificationId}/acknowledge``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_notifications_notificationId_acknowledge(
    customerId: 'sample',
    notificationId: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/notifications/{notificationId}/acknowledge",
  "summary": "Acknowledge a domain notification",
  "data": {}
}
```

## post__v2_customers_customerId_domains_register

Purchase and register the specified Domain

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/register``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_register(
    customerId: 'sample',
    body: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/register",
  "summary": "Purchase and register the specified Domain",
  "data": {}
}
```

## get__v2_customers_customerId_domains_register_schema_tld

Retrieve the schema to be submitted when registering a Domain for the specified TLD

- HTTP method: ``GET``
- Path: ``/v2/customers/{customerId}/domains/register/schema/{tld}``

### Input

```php
$response = $client->domains()->get__v2_customers_customerId_domains_register_schema_tld(
    customerId: 'sample',
    tld: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/customers/{customerId}/domains/register/schema/{tld}",
  "summary": "Retrieve the schema to be submitted when registering a Domain for the specified TLD",
  "data": {}
}
```

## post__v2_customers_customerId_domains_register_validate

Validate the request body using the Domain Registration Schema for the specified TLD

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/register/validate``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_register_validate(
    customerId: 'sample',
    body: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/register/validate",
  "summary": "Validate the request body using the Domain Registration Schema for the specified TLD",
  "data": {}
}
```

## get__v2_domains_maintenances

Retrieve a list of upcoming system Maintenances

- HTTP method: ``GET``
- Path: ``/v2/domains/maintenances``

### Input

```php
$response = $client->domains()->get__v2_domains_maintenances(
    xRequestId: 'header-value',
    status: 'sample',
    modifiedAtAfter: 'sample',
    startsAtAfter: 'sample',
    limit: 1,
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/domains/maintenances",
  "summary": "Retrieve a list of upcoming system Maintenances",
  "data": {}
}
```

## get__v2_domains_maintenances_maintenanceId

Retrieve the details for an upcoming system Maintenances

- HTTP method: ``GET``
- Path: ``/v2/domains/maintenances/{maintenanceId}``

### Input

```php
$response = $client->domains()->get__v2_domains_maintenances_maintenanceId(
    maintenanceId: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/domains/maintenances/{maintenanceId}",
  "summary": "Retrieve the details for an upcoming system Maintenances",
  "data": {}
}
```

## get__v2_domains_usage_yyyymm

Retrieve api usage request counts for a specific year/month.  The data is retained for a period of three months.

- HTTP method: ``GET``
- Path: ``/v2/domains/usage/{yyyymm}``

### Input

```php
$response = $client->domains()->get__v2_domains_usage_yyyymm(
    yyyymm: 'sample',
    xRequestId: 'header-value',
    includes: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "GET",
  "path": "/v2/domains/usage/{yyyymm}",
  "summary": "Retrieve api usage request counts for a specific year/month.  The data is retained for a period of three months.",
  "data": {}
}
```

## patch__v2_customers_customerId_domains_domain_contacts

Update domain contacts

- HTTP method: ``PATCH``
- Path: ``/v2/customers/{customerId}/domains/{domain}/contacts``

### Input

```php
$response = $client->domains()->patch__v2_customers_customerId_domains_domain_contacts(
    customerId: 'sample',
    domain: 'sample',
    body: ['sample'],
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "PATCH",
  "path": "/v2/customers/{customerId}/domains/{domain}/contacts",
  "summary": "Update domain contacts",
  "data": {}
}
```

## post__v2_customers_customerId_domains_domain_regenerateAuthCode

Regenerate the auth code for the given domain

- HTTP method: ``POST``
- Path: ``/v2/customers/{customerId}/domains/{domain}/regenerateAuthCode``

### Input

```php
$response = $client->domains()->post__v2_customers_customerId_domains_domain_regenerateAuthCode(
    customerId: 'sample',
    domain: 'sample',
    xRequestId: 'header-value',
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v2/customers/{customerId}/domains/{domain}/regenerateAuthCode",
  "summary": "Regenerate the auth code for the given domain",
  "data": {}
}
```

