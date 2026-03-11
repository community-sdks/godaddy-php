# Domains Service

Client accessor: `$client->domains()`

## Method Index

- [`list`](#list): `DomainCollectionResponse`
- [`getAgreement`](#getagreement): `DomainAgreementResponse`
- [`available`](#available): `DomainAvailabilityResponse`
- [`availableBulk`](#availablebulk): `DomainBulkAvailabilityResponse`
- [`contactsValidate`](#contactsvalidate): `DomainValidationResultResponse`
- [`purchase`](#purchase): `DomainOrderResponse`
- [`schema`](#schema): `DomainSchemaResponse`
- [`validate`](#validate): `DomainValidationResultResponse`
- [`suggest`](#suggest): `DomainSuggestionsResponse`
- [`tlds`](#tlds): `DomainTldListResponse`
- [`cancel`](#cancel): `DomainOperationResponse`
- [`get`](#get): `DomainDetailsResponse`
- [`update`](#update): `DomainOrderResponse`
- [`updateContacts`](#updatecontacts): `DomainOrderResponse`
- [`cancelPrivacy`](#cancelprivacy): `DomainOperationResponse`
- [`purchasePrivacy`](#purchaseprivacy): `DomainOrderResponse`
- [`recordAdd`](#recordadd): `DomainRecordListResponse`
- [`recordReplace`](#recordreplace): `DomainRecordListResponse`
- [`recordGet`](#recordget): `DomainRecordListResponse`
- [`recordReplaceTypeName`](#recordreplacetypename): `DomainRecordListResponse`
- [`recordDeleteTypeName`](#recorddeletetypename): `DomainRecordListResponse`
- [`recordReplaceType`](#recordreplacetype): `DomainRecordListResponse`
- [`renew`](#renew): `DomainOrderResponse`
- [`transferIn`](#transferin): `DomainTransferResponse`
- [`verifyEmail`](#verifyemail): `DomainDetailsResponse`
- [`getCustomerDomain`](#getcustomerdomain): `DomainDetailsResponse`
- [`cancelCustomerDomainChangeOfRegistrant`](#cancelcustomerdomainchangeofregistrant): `DomainOperationResponse`
- [`getCustomerDomainChangeOfRegistrant`](#getcustomerdomainchangeofregistrant): `DomainDetailsResponse`
- [`addCustomerDomainDnssecRecords`](#addcustomerdomaindnssecrecords): `DomainRecordListResponse`
- [`removeCustomerDomainDnssecRecords`](#removecustomerdomaindnssecrecords): `DomainRecordListResponse`
- [`replaceCustomerDomainNameServers`](#replacecustomerdomainnameservers): `DomainOrderResponse`
- [`getCustomerDomainPrivacyForwarding`](#getcustomerdomainprivacyforwarding): `DomainForwardingResponse`
- [`updateCustomerDomainPrivacyForwarding`](#updatecustomerdomainprivacyforwarding): `DomainForwardingResponse`
- [`redeemCustomerDomain`](#redeemcustomerdomain): `DomainDetailsResponse`
- [`renewCustomerDomain`](#renewcustomerdomain): `DomainOrderResponse`
- [`transferCustomerDomain`](#transfercustomerdomain): `DomainTransferResponse`
- [`getCustomerDomainTransferStatus`](#getcustomerdomaintransferstatus): `DomainTransferResponse`
- [`validateCustomerDomainTransfer`](#validatecustomerdomaintransfer): `DomainValidationResultResponse`
- [`acceptCustomerDomainTransferIn`](#acceptcustomerdomaintransferin): `DomainTransferResponse`
- [`cancelCustomerDomainTransferIn`](#cancelcustomerdomaintransferin): `DomainTransferResponse`
- [`restartCustomerDomainTransferIn`](#restartcustomerdomaintransferin): `DomainTransferResponse`
- [`retryCustomerDomainTransferIn`](#retrycustomerdomaintransferin): `DomainTransferResponse`
- [`initiateCustomerDomainTransferOut`](#initiatecustomerdomaintransferout): `DomainTransferResponse`
- [`acceptCustomerDomainTransferOut`](#acceptcustomerdomaintransferout): `DomainTransferResponse`
- [`rejectCustomerDomainTransferOut`](#rejectcustomerdomaintransferout): `DomainTransferResponse`
- [`deleteDomainForwarding`](#deletedomainforwarding): `DomainForwardingResponse`
- [`getDomainForwarding`](#getdomainforwarding): `DomainForwardingResponse`
- [`updateDomainForwarding`](#updatedomainforwarding): `DomainForwardingResponse`
- [`createDomainForwarding`](#createdomainforwarding): `DomainForwardingResponse`
- [`listCustomerDomainActions`](#listcustomerdomainactions): `DomainActionCollectionResponse`
- [`cancelCustomerDomainAction`](#cancelcustomerdomainaction): `DomainOperationResponse`
- [`getCustomerDomainAction`](#getcustomerdomainaction): `DomainDetailsResponse`
- [`getCustomerDomainNotifications`](#getcustomerdomainnotifications): `DomainNotificationListResponse`
- [`getCustomerDomainNotificationOptIns`](#getcustomerdomainnotificationoptins): `DomainNotificationListResponse`
- [`updateCustomerDomainNotificationOptIns`](#updatecustomerdomainnotificationoptins): `DomainNotificationListResponse`
- [`getCustomerDomainNotificationSchema`](#getcustomerdomainnotificationschema): `DomainNotificationSchemaResponse`
- [`acknowledgeCustomerDomainNotification`](#acknowledgecustomerdomainnotification): `DomainNotificationAckResponse`
- [`registerCustomerDomain`](#registercustomerdomain): `DomainOrderResponse`
- [`getCustomerDomainRegisterSchema`](#getcustomerdomainregisterschema): `DomainSchemaResponse`
- [`validateCustomerDomainRegister`](#validatecustomerdomainregister): `DomainValidationResultResponse`
- [`listDomainMaintenances`](#listdomainmaintenances): `DomainMaintenanceListResponse`
- [`getDomainMaintenance`](#getdomainmaintenance): `DomainMaintenanceResponse`
- [`getDomainUsage`](#getdomainusage): `DomainUsageResponse`
- [`updateCustomerDomainContacts`](#updatecustomerdomaincontacts): `DomainOrderResponse`
- [`regenerateCustomerDomainAuthCode`](#regeneratecustomerdomainauthcode): `DomainDetailsResponse`

## Methods

### list

Returns: `DomainCollectionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainsListRequest;

$response = $client->domains()->list(new DomainsListRequest());
```

Response JSON example:

```json
{
  "domain": "example.com",
  "status": "ACTIVE",
  "expires": "2027-03-11T00:00:00Z",
  "authCode": "AUTHCODE"
}
```

### getAgreement

Returns: `DomainAgreementResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainsAgreementRequest;

$response = $client->domains()->getAgreement(new DomainsAgreementRequest(
    tlds: [],
    privacy: true
));
```

Response JSON example:

```json
{
  "agreements": [
    {
      "agreementKey": "DNRA",
      "title": "Domain Name Registration Agreement",
      "url": "https://www.godaddy.com/legal/agreements/domain-registration"
    }
  ]
}
```

### available

Returns: `DomainAvailabilityResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainAvailabilityRequest;

$response = $client->domains()->available(new DomainAvailabilityRequest(
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "available": true,
  "price": 1999,
  "currency": "USD",
  "definitive": true,
  "period": 1
}
```

### availableBulk

Returns: `DomainBulkAvailabilityResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainAvailabilityBulkRequest;

$response = $client->domains()->availableBulk(new DomainAvailabilityBulkRequest(
    domains: ['example.com']
));
```

Response JSON example:

```json
{
  "domains": [
    {
      "domain": "example.com",
      "available": true,
      "price": 1999,
      "currency": "USD"
    }
  ]
}
```

### contactsValidate

Returns: `DomainValidationResultResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainContactsValidateRequest;

$response = $client->domains()->contactsValidate(new DomainContactsValidateRequest(
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "valid": false,
  "errors": [
    {
      "path": "domain",
      "message": "Domain is invalid"
    }
  ]
}
```

### purchase

Returns: `DomainOrderResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainPurchaseRequest;

$response = $client->domains()->purchase(new DomainPurchaseRequest(
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "orderId": "1234567890",
  "status": "PENDING",
  "submittedAt": "2026-03-11T12:00:00Z"
}
```

### schema

Returns: `DomainSchemaResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainSchemaRequest;

$response = $client->domains()->schema(new DomainSchemaRequest(
    tld: 'example'
));
```

Response JSON example:

```json
{
  "fields": [
    {
      "path": "consent.agreementKeys",
      "type": "array",
      "required": true
    }
  ]
}
```

### validate

Returns: `DomainValidationResultResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainValidateRequest;

$response = $client->domains()->validate(new DomainValidateRequest(
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "valid": false,
  "errors": [
    {
      "path": "domain",
      "message": "Domain is invalid"
    }
  ]
}
```

### suggest

Returns: `DomainSuggestionsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainSuggestRequest;

$response = $client->domains()->suggest(new DomainSuggestRequest());
```

Response JSON example:

```json
[
  "example.com",
  "example.net"
]
```

### tlds

Returns: `DomainTldListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainsTldsRequest;

$response = $client->domains()->tlds(new DomainsTldsRequest());
```

Response JSON example:

```json
{
  "tld": "com",
  "type": "GENERIC",
  "isIdn": false
}
```

### cancel

Returns: `DomainOperationResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainPathRequest;

$response = $client->domains()->cancel(new DomainPathRequest(
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "success": true
}
```

### get

Returns: `DomainDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainPathRequest;

$response = $client->domains()->get(new DomainPathRequest(
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "status": "ACTIVE",
  "expires": "2027-03-11T00:00:00Z",
  "authCode": "AUTHCODE"
}
```

### update

Returns: `DomainOrderResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainBodyRequest;

$response = $client->domains()->update(new DomainBodyRequest(
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "orderId": "1234567890",
  "status": "PENDING",
  "submittedAt": "2026-03-11T12:00:00Z"
}
```

### updateContacts

Returns: `DomainOrderResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainBodyRequest;

$response = $client->domains()->updateContacts(new DomainBodyRequest(
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "orderId": "1234567890",
  "status": "PENDING",
  "submittedAt": "2026-03-11T12:00:00Z"
}
```

### cancelPrivacy

Returns: `DomainOperationResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainPathRequest;

$response = $client->domains()->cancelPrivacy(new DomainPathRequest(
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "success": true
}
```

### purchasePrivacy

Returns: `DomainOrderResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainBodyRequest;

$response = $client->domains()->purchasePrivacy(new DomainBodyRequest(
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "orderId": "1234567890",
  "status": "PENDING",
  "submittedAt": "2026-03-11T12:00:00Z"
}
```

### recordAdd

Returns: `DomainRecordListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainBodyRequest;

$response = $client->domains()->recordAdd(new DomainBodyRequest(
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "type": "A",
  "name": "@",
  "data": "203.0.113.10",
  "ttl": 600
}
```

### recordReplace

Returns: `DomainRecordListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainBodyRequest;

$response = $client->domains()->recordReplace(new DomainBodyRequest(
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "type": "A",
  "name": "@",
  "data": "203.0.113.10",
  "ttl": 600
}
```

### recordGet

Returns: `DomainRecordListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainTypeNameLookupRequest;

$response = $client->domains()->recordGet(new DomainTypeNameLookupRequest(
    domain: 'example.com',
    type: 'A',
    name: '@'
));
```

Response JSON example:

```json
{
  "type": "A",
  "name": "@",
  "data": "203.0.113.10",
  "ttl": 600
}
```

### recordReplaceTypeName

Returns: `DomainRecordListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainTypeNameBodyRequest;

$response = $client->domains()->recordReplaceTypeName(new DomainTypeNameBodyRequest(
    domain: 'example.com',
    type: 'A',
    name: '@',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "type": "A",
  "name": "@",
  "data": "203.0.113.10",
  "ttl": 600
}
```

### recordDeleteTypeName

Returns: `DomainRecordListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainTypeNameLookupRequest;

$response = $client->domains()->recordDeleteTypeName(new DomainTypeNameLookupRequest(
    domain: 'example.com',
    type: 'A',
    name: '@'
));
```

Response JSON example:

```json
{
  "type": "A",
  "name": "@",
  "data": "203.0.113.10",
  "ttl": 600
}
```

### recordReplaceType

Returns: `DomainRecordListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainTypeBodyRequest;

$response = $client->domains()->recordReplaceType(new DomainTypeBodyRequest(
    domain: 'example.com',
    type: 'A',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "type": "A",
  "name": "@",
  "data": "203.0.113.10",
  "ttl": 600
}
```

### renew

Returns: `DomainOrderResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainRenewRequest;

$response = $client->domains()->renew(new DomainRenewRequest(
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "orderId": "1234567890",
  "status": "PENDING",
  "submittedAt": "2026-03-11T12:00:00Z"
}
```

### transferIn

Returns: `DomainTransferResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainBodyRequest;

$response = $client->domains()->transferIn(new DomainBodyRequest(
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "transferStatus": "PENDING",
  "updatedAt": "2026-03-11T12:00:00Z"
}
```

### verifyEmail

Returns: `DomainDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainPathRequest;

$response = $client->domains()->verifyEmail(new DomainPathRequest(
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "status": "ACTIVE",
  "expires": "2027-03-11T00:00:00Z",
  "authCode": "AUTHCODE"
}
```

### getCustomerDomain

Returns: `DomainDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainIncludesRequest;

$response = $client->domains()->getCustomerDomain(new CustomerDomainIncludesRequest(
    customerId: '123456789',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "status": "ACTIVE",
  "expires": "2027-03-11T00:00:00Z",
  "authCode": "AUTHCODE"
}
```

### cancelCustomerDomainChangeOfRegistrant

Returns: `DomainOperationResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainRequest;

$response = $client->domains()->cancelCustomerDomainChangeOfRegistrant(new CustomerDomainRequest(
    customerId: '123456789',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "success": true
}
```

### getCustomerDomainChangeOfRegistrant

Returns: `DomainDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainRequest;

$response = $client->domains()->getCustomerDomainChangeOfRegistrant(new CustomerDomainRequest(
    customerId: '123456789',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "status": "ACTIVE",
  "expires": "2027-03-11T00:00:00Z",
  "authCode": "AUTHCODE"
}
```

### addCustomerDomainDnssecRecords

Returns: `DomainRecordListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainBodyRequest;

$response = $client->domains()->addCustomerDomainDnssecRecords(new CustomerDomainBodyRequest(
    customerId: '123456789',
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "type": "A",
  "name": "@",
  "data": "203.0.113.10",
  "ttl": 600
}
```

### removeCustomerDomainDnssecRecords

Returns: `DomainRecordListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainBodyRequest;

$response = $client->domains()->removeCustomerDomainDnssecRecords(new CustomerDomainBodyRequest(
    customerId: '123456789',
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "type": "A",
  "name": "@",
  "data": "203.0.113.10",
  "ttl": 600
}
```

### replaceCustomerDomainNameServers

Returns: `DomainOrderResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainBodyRequest;

$response = $client->domains()->replaceCustomerDomainNameServers(new CustomerDomainBodyRequest(
    customerId: '123456789',
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "orderId": "1234567890",
  "status": "PENDING",
  "submittedAt": "2026-03-11T12:00:00Z"
}
```

### getCustomerDomainPrivacyForwarding

Returns: `DomainForwardingResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainRequest;

$response = $client->domains()->getCustomerDomainPrivacyForwarding(new CustomerDomainRequest(
    customerId: '123456789',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "fqdn": "example.com",
  "type": "PERMANENT",
  "to": "https://www.example.com"
}
```

### updateCustomerDomainPrivacyForwarding

Returns: `DomainForwardingResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainBodyRequest;

$response = $client->domains()->updateCustomerDomainPrivacyForwarding(new CustomerDomainBodyRequest(
    customerId: '123456789',
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "fqdn": "example.com",
  "type": "PERMANENT",
  "to": "https://www.example.com"
}
```

### redeemCustomerDomain

Returns: `DomainDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainOptionalBodyRequest;

$response = $client->domains()->redeemCustomerDomain(new CustomerDomainOptionalBodyRequest(
    customerId: '123456789',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "status": "ACTIVE",
  "expires": "2027-03-11T00:00:00Z",
  "authCode": "AUTHCODE"
}
```

### renewCustomerDomain

Returns: `DomainOrderResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainBodyRequest;

$response = $client->domains()->renewCustomerDomain(new CustomerDomainBodyRequest(
    customerId: '123456789',
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "orderId": "1234567890",
  "status": "PENDING",
  "submittedAt": "2026-03-11T12:00:00Z"
}
```

### transferCustomerDomain

Returns: `DomainTransferResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainBodyRequest;

$response = $client->domains()->transferCustomerDomain(new CustomerDomainBodyRequest(
    customerId: '123456789',
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "transferStatus": "PENDING",
  "updatedAt": "2026-03-11T12:00:00Z"
}
```

### getCustomerDomainTransferStatus

Returns: `DomainTransferResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainRequest;

$response = $client->domains()->getCustomerDomainTransferStatus(new CustomerDomainRequest(
    customerId: '123456789',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "transferStatus": "PENDING",
  "updatedAt": "2026-03-11T12:00:00Z"
}
```

### validateCustomerDomainTransfer

Returns: `DomainValidationResultResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainBodyRequest;

$response = $client->domains()->validateCustomerDomainTransfer(new CustomerDomainBodyRequest(
    customerId: '123456789',
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "valid": false,
  "errors": [
    {
      "path": "domain",
      "message": "Domain is invalid"
    }
  ]
}
```

### acceptCustomerDomainTransferIn

Returns: `DomainTransferResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainBodyRequest;

$response = $client->domains()->acceptCustomerDomainTransferIn(new CustomerDomainBodyRequest(
    customerId: '123456789',
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "transferStatus": "PENDING",
  "updatedAt": "2026-03-11T12:00:00Z"
}
```

### cancelCustomerDomainTransferIn

Returns: `DomainTransferResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainRequest;

$response = $client->domains()->cancelCustomerDomainTransferIn(new CustomerDomainRequest(
    customerId: '123456789',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "transferStatus": "PENDING",
  "updatedAt": "2026-03-11T12:00:00Z"
}
```

### restartCustomerDomainTransferIn

Returns: `DomainTransferResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainRequest;

$response = $client->domains()->restartCustomerDomainTransferIn(new CustomerDomainRequest(
    customerId: '123456789',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "transferStatus": "PENDING",
  "updatedAt": "2026-03-11T12:00:00Z"
}
```

### retryCustomerDomainTransferIn

Returns: `DomainTransferResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainBodyRequest;

$response = $client->domains()->retryCustomerDomainTransferIn(new CustomerDomainBodyRequest(
    customerId: '123456789',
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "transferStatus": "PENDING",
  "updatedAt": "2026-03-11T12:00:00Z"
}
```

### initiateCustomerDomainTransferOut

Returns: `DomainTransferResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainRegistrarRequest;

$response = $client->domains()->initiateCustomerDomainTransferOut(new CustomerDomainRegistrarRequest(
    customerId: '123456789',
    domain: 'example.com',
    registrar: 'example'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "transferStatus": "PENDING",
  "updatedAt": "2026-03-11T12:00:00Z"
}
```

### acceptCustomerDomainTransferOut

Returns: `DomainTransferResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainRequest;

$response = $client->domains()->acceptCustomerDomainTransferOut(new CustomerDomainRequest(
    customerId: '123456789',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "transferStatus": "PENDING",
  "updatedAt": "2026-03-11T12:00:00Z"
}
```

### rejectCustomerDomainTransferOut

Returns: `DomainTransferResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainReasonRequest;

$response = $client->domains()->rejectCustomerDomainTransferOut(new CustomerDomainReasonRequest(
    customerId: '123456789',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "transferStatus": "PENDING",
  "updatedAt": "2026-03-11T12:00:00Z"
}
```

### deleteDomainForwarding

Returns: `DomainForwardingResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainForwardingRequest;

$response = $client->domains()->deleteDomainForwarding(new DomainForwardingRequest(
    customerId: '123456789',
    fqdn: 'example'
));
```

Response JSON example:

```json
{
  "fqdn": "example.com",
  "type": "PERMANENT",
  "to": "https://www.example.com"
}
```

### getDomainForwarding

Returns: `DomainForwardingResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainForwardingRequest;

$response = $client->domains()->getDomainForwarding(new DomainForwardingRequest(
    customerId: '123456789',
    fqdn: 'example'
));
```

Response JSON example:

```json
{
  "fqdn": "example.com",
  "type": "PERMANENT",
  "to": "https://www.example.com"
}
```

### updateDomainForwarding

Returns: `DomainForwardingResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainForwardingRequest;

$response = $client->domains()->updateDomainForwarding(new DomainForwardingRequest(
    customerId: '123456789',
    fqdn: 'example'
));
```

Response JSON example:

```json
{
  "fqdn": "example.com",
  "type": "PERMANENT",
  "to": "https://www.example.com"
}
```

### createDomainForwarding

Returns: `DomainForwardingResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainForwardingRequest;

$response = $client->domains()->createDomainForwarding(new DomainForwardingRequest(
    customerId: '123456789',
    fqdn: 'example'
));
```

Response JSON example:

```json
{
  "fqdn": "example.com",
  "type": "PERMANENT",
  "to": "https://www.example.com"
}
```

### listCustomerDomainActions

Returns: `DomainActionCollectionResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainRequest;

$response = $client->domains()->listCustomerDomainActions(new CustomerDomainRequest(
    customerId: '123456789',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "actionType": "CHANGE_OF_REGISTRANT",
  "status": "PENDING",
  "createdAt": "2026-03-11T12:00:00Z",
  "domain": "example.com"
}
```

### cancelCustomerDomainAction

Returns: `DomainOperationResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainActionTypeRequest;

$response = $client->domains()->cancelCustomerDomainAction(new CustomerDomainActionTypeRequest(
    customerId: '123456789',
    domain: 'example.com',
    type: 'A'
));
```

Response JSON example:

```json
{
  "success": true
}
```

### getCustomerDomainAction

Returns: `DomainDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainActionTypeRequest;

$response = $client->domains()->getCustomerDomainAction(new CustomerDomainActionTypeRequest(
    customerId: '123456789',
    domain: 'example.com',
    type: 'A'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "status": "ACTIVE",
  "expires": "2027-03-11T00:00:00Z",
  "authCode": "AUTHCODE"
}
```

### getCustomerDomainNotifications

Returns: `DomainNotificationListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerIdRequest;

$response = $client->domains()->getCustomerDomainNotifications(new CustomerIdRequest(
    customerId: '123456789'
));
```

Response JSON example:

```json
{
  "type": "EXPIRATION",
  "optedIn": true
}
```

### getCustomerDomainNotificationOptIns

Returns: `DomainNotificationListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerIdRequest;

$response = $client->domains()->getCustomerDomainNotificationOptIns(new CustomerIdRequest(
    customerId: '123456789'
));
```

Response JSON example:

```json
{
  "type": "EXPIRATION",
  "optedIn": true
}
```

### updateCustomerDomainNotificationOptIns

Returns: `DomainNotificationListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerNotificationOptInUpdateRequest;

$response = $client->domains()->updateCustomerDomainNotificationOptIns(new CustomerNotificationOptInUpdateRequest(
    customerId: '123456789',
    types: []
));
```

Response JSON example:

```json
{
  "type": "EXPIRATION",
  "optedIn": true
}
```

### getCustomerDomainNotificationSchema

Returns: `DomainNotificationSchemaResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerNotificationSchemaRequest;

$response = $client->domains()->getCustomerDomainNotificationSchema(new CustomerNotificationSchemaRequest(
    customerId: '123456789',
    type: 'A'
));
```

Response JSON example:

```json
{
  "fields": [
    {
      "path": "type",
      "type": "string",
      "required": true
    }
  ]
}
```

### acknowledgeCustomerDomainNotification

Returns: `DomainNotificationAckResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerNotificationAckRequest;

$response = $client->domains()->acknowledgeCustomerDomainNotification(new CustomerNotificationAckRequest(
    customerId: '123456789',
    notificationId: 'notif_1'
));
```

Response JSON example:

```json
{
  "notificationId": "notif_1",
  "acknowledged": true,
  "acknowledgedAt": "2026-03-11T12:00:00Z"
}
```

### registerCustomerDomain

Returns: `DomainOrderResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerRegisterRequest;

$response = $client->domains()->registerCustomerDomain(new CustomerRegisterRequest(
    customerId: '123456789',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "orderId": "1234567890",
  "status": "PENDING",
  "submittedAt": "2026-03-11T12:00:00Z"
}
```

### getCustomerDomainRegisterSchema

Returns: `DomainSchemaResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerRegisterSchemaRequest;

$response = $client->domains()->getCustomerDomainRegisterSchema(new CustomerRegisterSchemaRequest(
    customerId: '123456789',
    tld: 'example'
));
```

Response JSON example:

```json
{
  "fields": [
    {
      "path": "consent.agreementKeys",
      "type": "array",
      "required": true
    }
  ]
}
```

### validateCustomerDomainRegister

Returns: `DomainValidationResultResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerRegisterValidateRequest;

$response = $client->domains()->validateCustomerDomainRegister(new CustomerRegisterValidateRequest(
    customerId: '123456789',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "valid": false,
  "errors": [
    {
      "path": "domain",
      "message": "Domain is invalid"
    }
  ]
}
```

### listDomainMaintenances

Returns: `DomainMaintenanceListResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainsMaintenanceListRequest;

$response = $client->domains()->listDomainMaintenances(new DomainsMaintenanceListRequest());
```

Response JSON example:

```json
{
  "maintenanceId": "mnt_1",
  "status": "SCHEDULED",
  "startsAt": "2026-03-20T00:00:00Z",
  "endsAt": "2026-03-20T02:00:00Z"
}
```

### getDomainMaintenance

Returns: `DomainMaintenanceResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainMaintenanceRequest;

$response = $client->domains()->getDomainMaintenance(new DomainMaintenanceRequest(
    maintenanceId: 'mnt_1'
));
```

Response JSON example:

```json
{
  "maintenanceId": "mnt_1",
  "status": "SCHEDULED",
  "startsAt": "2026-03-20T00:00:00Z",
  "endsAt": "2026-03-20T02:00:00Z"
}
```

### getDomainUsage

Returns: `DomainUsageResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainsUsageRequest;

$response = $client->domains()->getDomainUsage(new DomainsUsageRequest(
    yyyymm: '202603'
));
```

Response JSON example:

```json
{
  "month": "202603",
  "domainsUnderManagement": 120,
  "domainAdds": 10,
  "domainTransfersIn": 3
}
```

### updateCustomerDomainContacts

Returns: `DomainOrderResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainBodyRequest;

$response = $client->domains()->updateCustomerDomainContacts(new CustomerDomainBodyRequest(
    customerId: '123456789',
    domain: 'example.com',
    body: ['domain' => 'example.com']
));
```

Response JSON example:

```json
{
  "orderId": "1234567890",
  "status": "PENDING",
  "submittedAt": "2026-03-11T12:00:00Z"
}
```

### regenerateCustomerDomainAuthCode

Returns: `DomainDetailsResponse`

Request code:

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\CustomerDomainRequest;

$response = $client->domains()->regenerateCustomerDomainAuthCode(new CustomerDomainRequest(
    customerId: '123456789',
    domain: 'example.com'
));
```

Response JSON example:

```json
{
  "domain": "example.com",
  "status": "ACTIVE",
  "expires": "2027-03-11T00:00:00Z",
  "authCode": "AUTHCODE"
}
```

## Exceptions

Service-specific exceptions are under `CommunitySDKs\GoDaddy\Exception\Domains\*` and expose `getErrorResponse()`.






