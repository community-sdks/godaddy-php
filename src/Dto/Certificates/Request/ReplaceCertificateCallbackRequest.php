<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class ReplaceCertificateCallbackRequest
{
    public function __construct(
        public string $certificateId,
        public string $callbackUrl
    ) {
    }

    public function toPathParams(): array
    {
        return ['certificateId' => $this->certificateId];
    }

    public function toQueryParams(): array
    {
        return ['callbackUrl' => $this->callbackUrl];
    }
}
