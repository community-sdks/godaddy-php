<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class AddAlternateEmailAddressRequest
{
    public function __construct(
        public string $certificateId,
        public string $emailAddress
    ) {
    }

    public function toPathParams(): array
    {
        return [
            'certificateId' => $this->certificateId,
            'emailAddress' => $this->emailAddress,
        ];
    }
}
