<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Service;

use CommunitySDKs\GoDaddy\ApiClient;

abstract class AbstractService
{
    public function __construct(
        protected readonly ApiClient $client,
        protected readonly string $serviceName
    ) {
    }

    protected function call(
        string $method,
        string $path,
        array $pathParams = [],
        array $queryParams = [],
        array $headers = [],
        mixed $body = null,
        bool $multipart = false
    ): mixed {
        return $this->client->request(
            method: $method,
            serviceName: $this->serviceName,
            path: $path,
            pathParams: $pathParams,
            queryParams: $queryParams,
            headers: $headers,
            body: $body,
            multipart: $multipart
        );
    }
}
