# Certificates Service

Client accessor: `$client->certificates()`

## Method Index

- [`create`](#create): `CertificateIdentifierResponse`
- [`validate`](#validate): `CertificateValidationResponse`
- [`get`](#get): `CertificateIdentifierResponse`
- [`listActions`](#listactions): `CertificateActionListResponse`
- [`resendEmail`](#resendemail): `CertificateIdentifierResponse`
- [`addAlternateEmailAddress`](#addalternateemailaddress): `CertificateIdentifierResponse`
- [`resendEmailToAddress`](#resendemailtoaddress): `CertificateIdentifierResponse`
- [`getEmailHistory`](#getemailhistory): `CertificateEmailHistoryResponse`
- [`deleteCallback`](#deletecallback): `CertificateCallbackResponse`
- [`getCallback`](#getcallback): `CertificateCallbackResponse`
- [`replaceCallback`](#replacecallback): `CertificateCallbackResponse`
- [`cancel`](#cancel): `CertificateIdentifierResponse`
- [`download`](#download): `CertificateBundleResponse`
- [`reissue`](#reissue): `CertificateIdentifierResponse`
- [`renew`](#renew): `CertificateIdentifierResponse`
- [`revoke`](#revoke): `CertificateIdentifierResponse`
- [`getSiteSeal`](#getsiteseal): `CertificateSiteSealResponse`
- [`verifyDomainControl`](#verifydomaincontrol): `CertificateIdentifierResponse`
- [`getByEntitlement`](#getbyentitlement): `CertificateCollectionResponse`
- [`createForEntitlement`](#createforentitlement): `CertificateIdentifierResponse`
- [`downloadByEntitlement`](#downloadbyentitlement): `CertificateBundleResponse`
- [`listCustomerCertificates`](#listcustomercertificates): `CertificateCollectionResponse`
- [`getCustomerCertificate`](#getcustomercertificate): `CertificateIdentifierResponse`
- [`listDomainVerifications`](#listdomainverifications): `CertificateCollectionResponse`
- [`getDomainVerificationDetails`](#getdomainverificationdetails): `CertificateDomainVerificationResponse`
- [`getAcmeExternalAccountBinding`](#getacmeexternalaccountbinding): `CertificateAcmeExternalAccountBindingResponse`
- [`searchSubscriptionsByDomain`](#searchsubscriptionsbydomain): `CertificateCollectionResponse`
- [`listSubscriptionCertificates`](#listsubscriptioncertificates): `CertificateCollectionResponse`

## Methods

### create

Returns: `CertificateIdentifierResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\CreateCertificateRequest;

$response = $client->certificates()->create(new CreateCertificateRequest(
    certificateCreate: []
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "PENDING_ISSUANCE"
}
```

### validate

Returns: `CertificateValidationResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ValidateCertificateRequest;

$response = $client->certificates()->validate(new ValidateCertificateRequest(
    certificateCreate: []
));
```

Response JSON example:

```json
{
  "valid": false,
  "issues": [
    {
      "path": "dnsNames[0]",
      "message": "SAN entry is invalid"
    }
  ]
}
```

### get

Returns: `CertificateIdentifierResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCertificateRequest;

$response = $client->certificates()->get(new GetCertificateRequest(
    certificateId: 'crt_123456'
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "PENDING_ISSUANCE"
}
```

### listActions

Returns: `CertificateActionListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ListCertificateActionsRequest;

$response = $client->certificates()->listActions(new ListCertificateActionsRequest(
    certificateId: 'crt_123456'
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "ISSUED",
  "commonName": "example.com",
  "expires": "2027-03-11T00:00:00Z"
}
```

### resendEmail

Returns: `CertificateIdentifierResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ResendCertificateEmailRequest;

$response = $client->certificates()->resendEmail(new ResendCertificateEmailRequest(
    certificateId: 'crt_123456',
    emailId: 'admin@example.com'
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "PENDING_ISSUANCE"
}
```

### addAlternateEmailAddress

Returns: `CertificateIdentifierResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\AddAlternateEmailAddressRequest;

$response = $client->certificates()->addAlternateEmailAddress(new AddAlternateEmailAddressRequest(
    certificateId: 'crt_123456',
    emailAddress: 'admin@example.com'
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "PENDING_ISSUANCE"
}
```

### resendEmailToAddress

Returns: `CertificateIdentifierResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ResendCertificateEmailToAddressRequest;

$response = $client->certificates()->resendEmailToAddress(new ResendCertificateEmailToAddressRequest(
    certificateId: 'crt_123456',
    emailId: 'admin@example.com',
    emailAddress: 'admin@example.com'
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "PENDING_ISSUANCE"
}
```

### getEmailHistory

Returns: `CertificateEmailHistoryResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCertificateEmailHistoryRequest;

$response = $client->certificates()->getEmailHistory(new GetCertificateEmailHistoryRequest(
    certificateId: 'crt_123456'
));
```

Response JSON example:

```json
{
  "history": [
    {
      "emailId": "mail_1",
      "emailAddress": "admin@example.com",
      "status": "SENT",
      "createdAt": "2026-03-11T12:00:00Z"
    }
  ]
}
```

### deleteCallback

Returns: `CertificateCallbackResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\DeleteCertificateCallbackRequest;

$response = $client->certificates()->deleteCallback(new DeleteCertificateCallbackRequest(
    certificateId: 'crt_123456'
));
```

Response JSON example:

```json
{
  "callbackUrl": "https://example.com/callback",
  "enabled": true
}
```

### getCallback

Returns: `CertificateCallbackResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCertificateCallbackRequest;

$response = $client->certificates()->getCallback(new GetCertificateCallbackRequest(
    certificateId: 'crt_123456'
));
```

Response JSON example:

```json
{
  "callbackUrl": "https://example.com/callback",
  "enabled": true
}
```

### replaceCallback

Returns: `CertificateCallbackResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ReplaceCertificateCallbackRequest;

$response = $client->certificates()->replaceCallback(new ReplaceCertificateCallbackRequest(
    certificateId: 'crt_123456',
    callbackUrl: 'example'
));
```

Response JSON example:

```json
{
  "callbackUrl": "https://example.com/callback",
  "enabled": true
}
```

### cancel

Returns: `CertificateIdentifierResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\CancelCertificateRequest;

$response = $client->certificates()->cancel(new CancelCertificateRequest(
    certificateId: 'crt_123456'
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "PENDING_ISSUANCE"
}
```

### download

Returns: `CertificateBundleResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\DownloadCertificateRequest;

$response = $client->certificates()->download(new DownloadCertificateRequest(
    certificateId: 'crt_123456'
));
```

Response JSON example:

```json
{
  "certificate": "-----BEGIN CERTIFICATE-----...",
  "privateKey": "-----BEGIN PRIVATE KEY-----...",
  "caBundle": "-----BEGIN CERTIFICATE-----..."
}
```

### reissue

Returns: `CertificateIdentifierResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ReissueCertificateRequest;

$response = $client->certificates()->reissue(new ReissueCertificateRequest(
    certificateId: 'crt_123456',
    reissueCreate: []
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "PENDING_ISSUANCE"
}
```

### renew

Returns: `CertificateIdentifierResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\RenewCertificateRequest;

$response = $client->certificates()->renew(new RenewCertificateRequest(
    certificateId: 'crt_123456',
    renewCreate: []
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "PENDING_ISSUANCE"
}
```

### revoke

Returns: `CertificateIdentifierResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\RevokeCertificateRequest;

$response = $client->certificates()->revoke(new RevokeCertificateRequest(
    certificateId: 'crt_123456',
    certificateRevoke: []
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "PENDING_ISSUANCE"
}
```

### getSiteSeal

Returns: `CertificateSiteSealResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCertificateSiteSealRequest;

$response = $client->certificates()->getSiteSeal(new GetCertificateSiteSealRequest(
    certificateId: 'crt_123456'
));
```

Response JSON example:

```json
{
  "html": "<div>Site Seal</div>"
}
```

### verifyDomainControl

Returns: `CertificateIdentifierResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\VerifyCertificateDomainControlRequest;

$response = $client->certificates()->verifyDomainControl(new VerifyCertificateDomainControlRequest(
    certificateId: 'crt_123456'
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "PENDING_ISSUANCE"
}
```

### getByEntitlement

Returns: `CertificateCollectionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCertificatesByEntitlementRequest;

$response = $client->certificates()->getByEntitlement(new GetCertificatesByEntitlementRequest(
    entitlementId: 'entl_001'
));
```

Response JSON example:

```json
{
  "certificates": [
    {
      "certificateId": "crt_123456",
      "commonName": "example.com",
      "status": "ISSUED",
      "expires": "2027-03-11T00:00:00Z"
    }
  ],
  "pagination": {
    "total": 1,
    "start": 0,
    "limit": 25
  }
}
```

### createForEntitlement

Returns: `CertificateIdentifierResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\CreateCertificateForEntitlementRequest;

$response = $client->certificates()->createForEntitlement(new CreateCertificateForEntitlementRequest(
    subscriptionCertificateCreate: []
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "PENDING_ISSUANCE"
}
```

### downloadByEntitlement

Returns: `CertificateBundleResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\DownloadCertificateByEntitlementRequest;

$response = $client->certificates()->downloadByEntitlement(new DownloadCertificateByEntitlementRequest(
    entitlementId: 'entl_001'
));
```

Response JSON example:

```json
{
  "certificate": "-----BEGIN CERTIFICATE-----...",
  "privateKey": "-----BEGIN PRIVATE KEY-----...",
  "caBundle": "-----BEGIN CERTIFICATE-----..."
}
```

### listCustomerCertificates

Returns: `CertificateCollectionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ListCustomerCertificatesRequest;

$response = $client->certificates()->listCustomerCertificates(new ListCustomerCertificatesRequest(
    customerId: '123456789'
));
```

Response JSON example:

```json
{
  "certificates": [
    {
      "certificateId": "crt_123456",
      "commonName": "example.com",
      "status": "ISSUED",
      "expires": "2027-03-11T00:00:00Z"
    }
  ],
  "pagination": {
    "total": 1,
    "start": 0,
    "limit": 25
  }
}
```

### getCustomerCertificate

Returns: `CertificateIdentifierResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetCustomerCertificateRequest;

$response = $client->certificates()->getCustomerCertificate(new GetCustomerCertificateRequest(
    customerId: '123456789',
    certificateId: 'crt_123456'
));
```

Response JSON example:

```json
{
  "certificateId": "crt_123456",
  "status": "PENDING_ISSUANCE"
}
```

### listDomainVerifications

Returns: `CertificateCollectionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ListDomainVerificationsRequest;

$response = $client->certificates()->listDomainVerifications(new ListDomainVerificationsRequest(
    customerId: '123456789',
    certificateId: 'crt_123456'
));
```

Response JSON example:

```json
{
  "certificates": [
    {
      "certificateId": "crt_123456",
      "commonName": "example.com",
      "status": "ISSUED",
      "expires": "2027-03-11T00:00:00Z"
    }
  ],
  "pagination": {
    "total": 1,
    "start": 0,
    "limit": 25
  }
}
```

### getDomainVerificationDetails

Returns: `CertificateDomainVerificationResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetDomainVerificationDetailsRequest;

$response = $client->certificates()->getDomainVerificationDetails(new GetDomainVerificationDetailsRequest(
    customerId: '123456789',
    certificateId: 'crt_123456',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "method": "DNS",
  "status": "PENDING",
  "token": "_acme-challenge",
  "value": "token-value"
}
```

### getAcmeExternalAccountBinding

Returns: `CertificateAcmeExternalAccountBindingResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\GetAcmeExternalAccountBindingRequest;

$response = $client->certificates()->getAcmeExternalAccountBinding(new GetAcmeExternalAccountBindingRequest(
    customerId: '123456789'
));
```

Response JSON example:

```json
{
  "kid": "kid_123",
  "hmacKey": "hmac_abc"
}
```

### searchSubscriptionsByDomain

Returns: `CertificateCollectionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\SearchSubscriptionsByDomainRequest;

$response = $client->certificates()->searchSubscriptionsByDomain(new SearchSubscriptionsByDomainRequest());
```

Response JSON example:

```json
{
  "certificates": [
    {
      "certificateId": "crt_123456",
      "commonName": "example.com",
      "status": "ISSUED",
      "expires": "2027-03-11T00:00:00Z"
    }
  ],
  "pagination": {
    "total": 1,
    "start": 0,
    "limit": 25
  }
}
```

### listSubscriptionCertificates

Returns: `CertificateCollectionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Certificates\Request\ListSubscriptionCertificatesRequest;

$response = $client->certificates()->listSubscriptionCertificates(new ListSubscriptionCertificatesRequest(
    guid: 'guid_123'
));
```

Response JSON example:

```json
{
  "certificates": [
    {
      "certificateId": "crt_123456",
      "commonName": "example.com",
      "status": "ISSUED",
      "expires": "2027-03-11T00:00:00Z"
    }
  ],
  "pagination": {
    "total": 1,
    "start": 0,
    "limit": 25
  }
}
```

## Exceptions

Service-specific exceptions are under `CommunitySDKs\GoDaddy\Exception\Certificates\*` and expose `getErrorResponse()`.






