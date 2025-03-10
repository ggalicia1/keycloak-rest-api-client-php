<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Test\Unit\OAuth\TokenStorage;

use Overtrue\Keycloak\Exception\TokenStorageException;
use Overtrue\Keycloak\OAuth\TokenStorage\Filesystem;
use Overtrue\Keycloak\Test\Unit\TokenGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Filesystem::class)]
class FilesystemTest extends TestCase
{
    use TokenGenerator;

    private string $path;

    private Filesystem $storage;

    protected function setUp(): void
    {
        $realpath = realpath(__DIR__);
        static::assertIsString($realpath);

        $this->path = $realpath;
        $this->storage = new Filesystem($this->path);
    }

    /**
     * @after
     */
    public function clearTokensFromFilesystem(): void
    {
        @unlink($this->path.'/access_token');
        @unlink($this->path.'/refresh_token');

        static::assertFalse(file_exists($this->path.'/access_token'));
        static::assertFalse(file_exists($this->path.'/refresh_token'));
    }

    public function test_returns_no_access_token_if_not_previously_set(): void
    {
        static::assertNull($this->storage->retrieveAccessToken());
    }

    public function test_returns_no_refresh_token_if_not_previously_set(): void
    {
        static::assertNull($this->storage->retrieveAccessToken());
    }

    public function test_returns_access_token_if_previously_set(): void
    {
        $accessToken = $this->generateToken(new \DateTimeImmutable);

        $this->storage->storeAccessToken($accessToken);

        static::assertSame($accessToken, $this->storage->retrieveAccessToken());
    }

    public function test_returns_refresh_token_if_previously_set(): void
    {
        $refreshToken = $this->generateToken(new \DateTimeImmutable);

        $this->storage->storeRefreshToken($refreshToken);

        static::assertSame($refreshToken, $this->storage->retrieveRefreshToken());
    }

    public function test_overrides_previously_stored_access_token(): void
    {
        $storedAccessToken = $this->generateToken(new \DateTimeImmutable);
        $newAccessToken = $this->generateToken(new \DateTimeImmutable);

        $this->storage->storeAccessToken($storedAccessToken);

        static::assertSame($storedAccessToken, $this->storage->retrieveAccessToken());

        $this->storage->storeAccessToken($newAccessToken);

        $this->recreateFilesystemStorage();

        static::assertNotSame($storedAccessToken, $this->storage->retrieveAccessToken());
        static::assertEquals($newAccessToken->toString(), $this->storage->retrieveAccessToken()->toString());
    }

    public function test_overrides_previously_stored_refresh_token(): void
    {
        $storedRefreshToken = $this->generateToken(new \DateTimeImmutable);
        $newRefreshToken = $this->generateToken(new \DateTimeImmutable);

        $this->storage->storeRefreshToken($storedRefreshToken);

        static::assertSame($storedRefreshToken, $this->storage->retrieveRefreshToken());

        $this->storage->storeRefreshToken($newRefreshToken);

        $this->recreateFilesystemStorage();

        static::assertNotSame($storedRefreshToken, $this->storage->retrieveRefreshToken());
        static::assertEquals($newRefreshToken->toString(), $this->storage->retrieveRefreshToken()->toString());
    }

    public function test_throws_exception_if_path_does_not_exist(): void
    {
        $path = __DIR__.'/does-not-exist';

        static::expectException(TokenStorageException::class);
        static::expectExceptionMessage(sprintf('Path "%s" does not exist or is not writable', $path));

        new Filesystem($path);
    }

    private function recreateFilesystemStorage(): void
    {
        $this->storage = new Filesystem($this->path);
    }
}
