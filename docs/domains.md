# Domains Service

This document covers the Domains service in the GoDaddy PHP SDK.

Client accessor: `$client->domains()`

All methods now:
- accept typed request DTOs only
- return `CommunitySDKs\GoDaddy\Dto\Domains\Response\DomainsResponse`
- throw typed domains exceptions under `CommunitySDKs\GoDaddy\Exception\Domains\*`

## Example

```php
use CommunitySDKs\GoDaddy\Dto\Domains\Request\DomainsListRequest;

$response = $client->domains()->list(
    new DomainsListRequest(
        xShopperId: '123',
        statuses: ['ACTIVE'],
        limit: 50,
    )
);

$data = $response->data;
```

## Exceptions

- `DomainsBadRequestException`
- `DomainsUnauthorizedException`
- `DomainsForbiddenException`
- `DomainsNotFoundException`
- `DomainsConflictException`
- `DomainsUnprocessableEntityException`
- `DomainsRateLimitException`
- `DomainsServerException`

Each extends `DomainsApiException` and exposes `getErrorResponse()`.

## V1 Methods

- `list(DomainsListRequest $request)`
- `getAgreement(DomainsAgreementRequest $request)`
- `available(DomainAvailabilityRequest $request)`
- `availableBulk(DomainAvailabilityBulkRequest $request)`
- `contactsValidate(DomainContactsValidateRequest $request)`
- `purchase(DomainPurchaseRequest $request)`
- `schema(DomainSchemaRequest $request)`
- `validate(DomainValidateRequest $request)`
- `suggest(DomainSuggestRequest $request)`
- `tlds(DomainsTldsRequest $request)`
- `cancel(DomainPathRequest $request)`
- `get(DomainPathRequest $request)`
- `update(DomainBodyRequest $request)`
- `updateContacts(DomainBodyRequest $request)`
- `cancelPrivacy(DomainPathRequest $request)`
- `purchasePrivacy(DomainBodyRequest $request)`
- `recordAdd(DomainBodyRequest $request)`
- `recordReplace(DomainBodyRequest $request)`
- `recordGet(DomainTypeNameLookupRequest $request)`
- `recordReplaceTypeName(DomainTypeNameBodyRequest $request)`
- `recordDeleteTypeName(DomainTypeNameLookupRequest $request)`
- `recordReplaceType(DomainTypeBodyRequest $request)`
- `renew(DomainRenewRequest $request)`
- `transferIn(DomainBodyRequest $request)`
- `verifyEmail(DomainPathRequest $request)`

## V2 Methods (Unique Names)

- `getCustomerDomain(CustomerDomainIncludesRequest $request)`
- `cancelCustomerDomainChangeOfRegistrant(CustomerDomainRequest $request)`
- `getCustomerDomainChangeOfRegistrant(CustomerDomainRequest $request)`
- `addCustomerDomainDnssecRecords(CustomerDomainBodyRequest $request)`
- `removeCustomerDomainDnssecRecords(CustomerDomainBodyRequest $request)`
- `replaceCustomerDomainNameServers(CustomerDomainBodyRequest $request)`
- `getCustomerDomainPrivacyForwarding(CustomerDomainRequest $request)`
- `updateCustomerDomainPrivacyForwarding(CustomerDomainBodyRequest $request)`
- `redeemCustomerDomain(CustomerDomainOptionalBodyRequest $request)`
- `renewCustomerDomain(CustomerDomainBodyRequest $request)`
- `transferCustomerDomain(CustomerDomainBodyRequest $request)`
- `getCustomerDomainTransferStatus(CustomerDomainRequest $request)`
- `validateCustomerDomainTransfer(CustomerDomainBodyRequest $request)`
- `acceptCustomerDomainTransferIn(CustomerDomainBodyRequest $request)`
- `cancelCustomerDomainTransferIn(CustomerDomainRequest $request)`
- `restartCustomerDomainTransferIn(CustomerDomainRequest $request)`
- `retryCustomerDomainTransferIn(CustomerDomainBodyRequest $request)`
- `initiateCustomerDomainTransferOut(CustomerDomainRegistrarRequest $request)`
- `acceptCustomerDomainTransferOut(CustomerDomainRequest $request)`
- `rejectCustomerDomainTransferOut(CustomerDomainReasonRequest $request)`
- `deleteDomainForwarding(DomainForwardingRequest $request)`
- `getDomainForwarding(DomainForwardingRequest $request)`
- `updateDomainForwarding(DomainForwardingRequest $request)`
- `createDomainForwarding(DomainForwardingRequest $request)`
- `listCustomerDomainActions(CustomerDomainRequest $request)`
- `cancelCustomerDomainAction(CustomerDomainActionTypeRequest $request)`
- `getCustomerDomainAction(CustomerDomainActionTypeRequest $request)`
- `getCustomerDomainNotifications(CustomerIdRequest $request)`
- `getCustomerDomainNotificationOptIns(CustomerIdRequest $request)`
- `updateCustomerDomainNotificationOptIns(CustomerNotificationOptInUpdateRequest $request)`
- `getCustomerDomainNotificationSchema(CustomerNotificationSchemaRequest $request)`
- `acknowledgeCustomerDomainNotification(CustomerNotificationAckRequest $request)`
- `registerCustomerDomain(CustomerRegisterRequest $request)`
- `getCustomerDomainRegisterSchema(CustomerRegisterSchemaRequest $request)`
- `validateCustomerDomainRegister(CustomerRegisterValidateRequest $request)`
- `listDomainMaintenances(DomainsMaintenanceListRequest $request)`
- `getDomainMaintenance(DomainMaintenanceRequest $request)`
- `getDomainUsage(DomainsUsageRequest $request)`
- `updateCustomerDomainContacts(CustomerDomainBodyRequest $request)`
- `regenerateCustomerDomainAuthCode(CustomerDomainRequest $request)`
