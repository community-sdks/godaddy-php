# Auctions Service

This document covers the Auctions service in the GoDaddy PHP SDK. It wraps the **Auctions API** endpoints from the provided Swagger file.

Client accessor: ``$client->auctions()``

## placeBids

Places multiple bids with a single request.

- HTTP method: ``POST``
- Path: ``/v1/customers/{customerId}/aftermarket/listings/bids``
- Swagger operationId: ``placeBids``

### Input

```php
$response = $client->auctions()->placeBids(
    customerId: 'sample',
    requestBody: ['sample'],
);
```

### Output

```json
{
  "ok": true,
  "method": "POST",
  "path": "/v1/customers/{customerId}/aftermarket/listings/bids",
  "summary": "Places multiple bids with a single request.",
  "data": {}
}
```

