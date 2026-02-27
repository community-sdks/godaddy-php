<?php
declare(strict_types=1);

namespace ZPMLabs\GoDaddy\Service;

use BadMethodCallException;
use InvalidArgumentException;

abstract class DynamicOperationService extends AbstractService
{
    public function __call(string $name, array $arguments): mixed
    {
        /** @var array<string, mixed> $operations */
        $operations = static::OPERATIONS;
        if (!isset($operations[$name])) {
            throw new BadMethodCallException('Undefined method ' . static::class . '::' . $name . '()');
        }

        $operation = $operations[$name];
        $params = $operation['params'] ?? [];
        if (count($arguments) > count($params)) {
            throw new InvalidArgumentException('Too many arguments for ' . static::class . '::' . $name . '()');
        }

        $pathParams = [];
        $queryParams = [];
        $headers = [];
        $body = null;

        foreach ($params as $index => $param) {
            $value = $arguments[$index] ?? null;
            if (($param['required'] ?? false) && $value === null) {
                throw new InvalidArgumentException('Missing required argument "' . $param['name'] . '" for ' . static::class . '::' . $name . '()');
            }

            switch ($param['in']) {
                case 'path':
                    $pathParams[$param['name']] = $value;
                    break;
                case 'query':
                    $queryParams[$param['name']] = $value;
                    break;
                case 'header':
                    $headers[$param['name']] = $value;
                    break;
                case 'body':
                    $body = $value;
                    break;
            }
        }

        return $this->call(
            method: $operation['method'],
            path: $operation['path'],
            pathParams: $pathParams,
            queryParams: $queryParams,
            headers: $headers,
            body: $body,
            multipart: (bool) ($operation['multipart'] ?? false)
        );
    }
}
