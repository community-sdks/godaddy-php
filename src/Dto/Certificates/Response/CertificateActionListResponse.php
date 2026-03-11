<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Certificates\Response;

final readonly class CertificateActionListResponse
{
    /** @param list<CertificateActionResponse> $actions */
    public function __construct(public array $actions)
    {
    }

    public static function fromMixed(mixed $data): self
    {
        if (is_array($data) && array_is_list($data)) {
            $actions = [];
            foreach ($data as $action) {
                $actions[] = CertificateActionResponse::fromMixed($action);
            }

            return new self($actions);
        }

        if (is_array($data) && isset($data['actions']) && is_array($data['actions'])) {
            $actions = [];
            foreach ($data['actions'] as $action) {
                $actions[] = CertificateActionResponse::fromMixed($action);
            }

            return new self($actions);
        }

        return new self([]);
    }
}
