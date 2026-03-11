<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class ReissueCertificateRequest
{
    public function __construct(
        public string $certificateId,
        public array $reissueCreate
    ) {
    }

    public function toPathParams(): array
    {
        return ['certificateId' => $this->certificateId];
    }

    public function toBody(): array
    {
        return $this->reissueCreate;
    }
}
