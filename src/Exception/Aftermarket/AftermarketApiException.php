<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Exception\Aftermarket;

use CommunitySDKs\GoDaddy\Exception\ApiException;

class AftermarketApiException extends ApiException
{
    public function __construct(
        string $message,
        int $statusCode,
        string $responseBody,
        array $headers,
        string $requestMethod,
        string $requestUrl,
        private readonly ?object $errorResponse = null
    ) {
        parent::__construct($message, $statusCode, $responseBody, $headers, $requestMethod, $requestUrl);
    }

    public function getErrorResponse(): ?object
    {
        return $this->errorResponse;
    }
}
