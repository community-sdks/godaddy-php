<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Auth;

use CommunitySDKs\GoDaddy\Config;

final class ApiKeyAuth
{
    public static function headers(Config $config): array
    {
        if ($config->apiKey === null || $config->apiSecret === null) {
            return [];
        }

        return [
            'Authorization' => 'sso-key ' . $config->apiKey . ':' . $config->apiSecret,
        ];
    }
}
