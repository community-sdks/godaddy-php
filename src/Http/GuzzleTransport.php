<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Http;

use GuzzleHttp\ClientInterface;

final class GuzzleTransport implements TransportInterface
{
    public function __construct(private readonly ClientInterface $client)
    {
    }

    public function send(Request $request): Response
    {
        $options = [
            'headers' => $request->headers,
            'query' => $request->query,
            'http_errors' => false,
            'timeout' => $request->timeout,
        ];

        if ($request->body !== null) {
            if ($request->multipart && is_array($request->body)) {
                $options['multipart'] = [];
                foreach ($request->body as $name => $value) {
                    if (is_array($value)) {
                        foreach ($value as $item) {
                            $options['multipart'][] = ['name' => (string) $name, 'contents' => (string) $item];
                        }
                    } else {
                        $options['multipart'][] = ['name' => (string) $name, 'contents' => (string) $value];
                    }
                }
            } elseif (is_array($request->body)) {
                $contentType = strtolower((string) ($request->headers['Content-Type'] ?? ''));
                if (str_contains($contentType, 'application/x-www-form-urlencoded')) {
                    $options['form_params'] = $request->body;
                } else {
                    $options['json'] = $request->body;
                }
            } else {
                $options['body'] = (string) $request->body;
            }
        }

        $response = $this->client->request($request->method, $request->url, $options);
        $headers = [];
        foreach ($response->getHeaders() as $name => $values) {
            $headers[$name] = implode(', ', $values);
        }

        return new Response(
            statusCode: $response->getStatusCode(),
            headers: $headers,
            body: (string) $response->getBody()
        );
    }
}
