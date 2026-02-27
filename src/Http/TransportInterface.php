<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Http;

interface TransportInterface
{
    public function send(Request $request): Response;
}
