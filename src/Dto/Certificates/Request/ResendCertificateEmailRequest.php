<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class ResendCertificateEmailRequest
{
    public function __construct(
        public string $certificateId,
        public string $emailId
    ) {
    }

    public function toPathParams(): array
    {
        return [
            'certificateId' => $this->certificateId,
            'emailId' => $this->emailId,
        ];
    }
}
