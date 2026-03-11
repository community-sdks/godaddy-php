<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class GetCustomerCertificateRequest
{
    public function __construct(
        public string $customerId,
        public string $certificateId
    ) {
    }

    public function toPathParams(): array
    {
        return [
            'customerId' => $this->customerId,
            'certificateId' => $this->certificateId,
        ];
    }
}
