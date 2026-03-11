<?php
declare(strict_types=1);

namespace CommunitySDKs\GoDaddy\Dto\Shoppers\Request;

final readonly class CreateSubaccountRequest
{
    public function __construct(
        public string $email,
        public string $password,
        public string $nameFirst,
        public string $nameLast,
        public ?int $externalId = null,
        public ?string $marketId = null
    ) {
    }

    public function toArray(): array
    {
        return array_filter([
            'email' => $this->email,
            'password' => $this->password,
            'nameFirst' => $this->nameFirst,
            'nameLast' => $this->nameLast,
            'externalId' => $this->externalId,
            'marketId' => $this->marketId,
        ], static fn (mixed $value): bool => $value !== null);
    }

    public static function sample(): self
    {
        return new self(
            email: 'sample@example.com',
            password: 'P@55w0rd+',
            nameFirst: 'Sample',
            nameLast: 'Shopper',
            externalId: 12345,
            marketId: 'en-US'
        );
    }
}
