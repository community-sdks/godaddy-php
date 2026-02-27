<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Tests\Support;

use ZPMLabs\GoDaddy\Http\Request;
use ZPMLabs\GoDaddy\Http\Response;
use ZPMLabs\GoDaddy\Http\TransportInterface;

final class TestTransport implements TransportInterface
{
    /** @var list<Request> */
    public array $requests = [];

    /** @var list<Response> */
    private array $queue = [];

    public function push(Response $response): void
    {
        $this->queue[] = $response;
    }

    public function send(Request $request): Response
    {
        $this->requests[] = $request;

        if ($this->queue === []) {
            return new Response(200, ['Content-Type' => 'application/json'], '{}');
        }

        return array_shift($this->queue);
    }
}
