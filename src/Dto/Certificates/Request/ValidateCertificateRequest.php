<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class ValidateCertificateRequest
{
    public function __construct(
        public array $certificateCreate,
        public ?string $xMarketId = null
    ) {
    }

    public function toHeaders(): array
    {
        return ['X-Market-Id' => $this->xMarketId];
    }

    public function toBody(): array
    {
        return $this->certificateCreate;
    }
}
