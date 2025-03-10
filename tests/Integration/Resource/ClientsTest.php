<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Test\Integration\Resource;

use Exception;
use Overtrue\Keycloak\Representation\Client;
use Overtrue\Keycloak\Test\Integration\IntegrationTestBehaviour;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class ClientsTest extends TestCase
{
    use IntegrationTestBehaviour;

    public function test_import_update_delete_client(): void
    {
        $resource = $this->getKeycloak()->clients();

        // Get all clients
        $allClients = $resource->all('master');
        static::assertGreaterThanOrEqual(1, $allClients->count());
        $client = $allClients->first();
        static::assertInstanceOf(Client::class, $client);

        // Import client
        $importedClient = $resource->import(
            'master',
            $client->withId(Uuid::uuid4()->toString())
                ->withClientId('imported-client')
                ->withDescription('Imported client'),
        );

        // Get single (imported) client
        $importedClient = $resource->get('master', $importedClient->getId());
        static::assertSame('Imported client', $importedClient->getDescription());

        // Update (imported) client
        $updatedClient = $resource->update('master', $importedClient->getId(), $importedClient->withDescription('Updated client'));
        static::assertSame('Updated client', $updatedClient->getDescription());

        // Delete (imported) client
        $resource->delete('master', $updatedClient->getId());

        try {
            $resource->get('master', $updatedClient->getId());
            static::fail('Client should not exist anymore');
        } catch (Exception $e) {
            static::assertSame(404, $e->getCode());
        }
    }

    public function test_get_user_sessions(): void
    {
        $resource = $this->getKeycloak()->clients();

        $client = $resource->all('master')->first();
        static::assertInstanceOf(Client::class, $client);

        $resource->getUserSessions('master', $client->getId());
    }

    public function test_get_client_secret(): void
    {
        $resource = $this->getKeycloak()->clients();

        $client = $resource->all('master')->first();
        static::assertInstanceOf(Client::class, $client);

        $clientUuid = $client->getId();
        static::assertIsString($clientUuid);

        $credential = $resource->getClientSecret('master', $clientUuid);
    }
}
