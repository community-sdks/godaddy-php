<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class ListCertificateActionsRequest
{
    public function __construct(public string $certificateId)
    {
    }

    public function toPathParams(): array
    {
        return ['certificateId' => $this->certificateId];
    }
}
