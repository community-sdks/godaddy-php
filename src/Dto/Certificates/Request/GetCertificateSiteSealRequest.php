<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Request;

final readonly class GetCertificateSiteSealRequest
{
    public function __construct(
        public string $certificateId,
        public mixed $theme = null,
        public mixed $locale = null
    ) {
    }

    public function toPathParams(): array
    {
        return ['certificateId' => $this->certificateId];
    }

    public function toQueryParams(): array
    {
        return [
            'theme' => $this->theme,
            'locale' => $this->locale,
        ];
    }
}
