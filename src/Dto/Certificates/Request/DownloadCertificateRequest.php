<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class DownloadCertificateRequest
{
    public function __construct(public string $certificateId)
    {
    }

    public function toPathParams(): array
    {
        return ['certificateId' => $this->certificateId];
    }
}
