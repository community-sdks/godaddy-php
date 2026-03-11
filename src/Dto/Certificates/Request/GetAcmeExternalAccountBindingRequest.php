<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class GetAcmeExternalAccountBindingRequest
{
    public function __construct(public string $customerId)
    {
    }

    public function toPathParams(): array
    {
        return ['customerId' => $this->customerId];
    }
}
