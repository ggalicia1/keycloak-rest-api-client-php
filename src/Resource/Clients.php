<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Resource;

use App\Paginate\Pagination;
use Overtrue\Keycloak\Collection\ClientCollection;
use Overtrue\Keycloak\Collection\RoleCollection;
use Overtrue\Keycloak\Http\Command;
use Overtrue\Keycloak\Http\Criteria;
use Overtrue\Keycloak\Http\Method;
use Overtrue\Keycloak\Http\Query;
use Overtrue\Keycloak\Representation\Client as ClientRepresentation;
use Overtrue\Keycloak\Representation\Role as RoleRepresentation;
use Overtrue\Keycloak\Representation\Credential;
use Psr\Http\Message\ResponseInterface;

/**
 * @phpstan-type UserSession array<mixed>
 */
class Clients extends Resource
{
    /**
     * @param  \Overtrue\Keycloak\Http\Criteria|array<string,mixed>|null  $criteria
     */
    public function all(string $realm, Criteria|array|null $criteria = null): ClientCollection
    {
        return $this->queryExecutor->executeQuery(
            new Query(
                '/admin/realms/{realm}/clients',
                ClientCollection::class,
                [
                    'realm' => $realm,
                ],
                $criteria,
            ),
        );
    }

    public function get(string $realm, string $clientUuid): ClientRepresentation
    {
        return $this->queryExecutor->executeQuery(
            new Query(
                '/admin/realms/{realm}/clients/{clientUuid}',
                ClientRepresentation::class,
                [
                    'realm' => $realm,
                    'clientUuid' => $clientUuid,
                ],
            ),
        );
    }

    /**
     * @param  \Overtrue\Keycloak\Representation\Client|array<string,mixed>  $client
     *
     * @throws \Overtrue\Keycloak\Exception\PropertyDoesNotExistException
     */
    public function import(string $realm, ClientRepresentation|array $client): ClientRepresentation
    {
        if (! $client instanceof ClientRepresentation) {
            $client = ClientRepresentation::from($client);
        }

        $response =  $this->commandExecutor->executeCommand(
            new Command(
                '/admin/realms/{realm}/clients',
                Method::POST,
                [
                    'realm' => $realm,
                ],
                $client,
            ),
        );

        $clientId = $this->getIdFromResponse($response);
        if ($clientId === null) {
            throw new \RuntimeException('Could not extract user id from response');
        }

       return $this->get($realm, $clientId);
    }

    /**
     * @param  \Overtrue\Keycloak\Representation\Client|array<string, mixed>  $updatedClient
     *
     * @throws \Overtrue\Keycloak\Exception\PropertyDoesNotExistException
     */
    public function update(string $realm, string $clientUuid, ClientRepresentation|array $updatedClient): ClientRepresentation
    {
        if (! $updatedClient instanceof ClientRepresentation) {
            $updatedClient = ClientRepresentation::from($updatedClient);
        }

        $this->commandExecutor->executeCommand(
            new Command(
                '/admin/realms/{realm}/clients/{clientUuid}',
                Method::PUT,
                [
                    'realm' => $realm,
                    'clientUuid' => $clientUuid,
                ],
                $updatedClient,
            ),
        );

        return $this->get($realm, $updatedClient->getId());
    }

    public function delete(string $realm, string $clientUuid): ResponseInterface
    {
        return $this->commandExecutor->executeCommand(
            new Command(
                '/admin/realms/{realm}/clients/{clientUuid}',
                Method::DELETE,
                [
                    'realm' => $realm,
                    'clientUuid' => $clientUuid,
                ],
            ),
        );
    }

    /**
     * @param  \Overtrue\Keycloak\Http\Criteria|array<string, mixed>|null  $criteria
     * @return array<array-key, mixed>
     */
    public function getUserSessions(string $realm, string $clientUuid, Criteria|array|null $criteria = null): array
    {
        return $this->queryExecutor->executeQuery(
            new Query(
                '/admin/realms/{realm}/clients/{clientUuid}/user-sessions',
                'array',
                [
                    'realm' => $realm,
                    'clientUuid' => $clientUuid,
                ],
                $criteria,
            ),
        );
    }

    public function getClientSecret(string $realm, string $clientUuid): Credential
    {
        return $this->queryExecutor->executeQuery(
            new Query(
                '/admin/realms/{realm}/clients/{clientUuid}/client-secret',
                Credential::class,
                [
                    'realm' => $realm,
                    'clientUuid' => $clientUuid,
                ],
            ),
        );
    }

    public function getClientRoles(string $realm, string $clientUuid, Criteria|array|null $criteria = null): RoleCollection
    {
        return $this->queryExecutor->executeQuery(
            new Query(
                '/admin/realms/{realm}/clients/{clientUuid}/roles',
                RoleCollection::class,
                [
                    'realm' => $realm,
                    'clientUuid' => $clientUuid,
                ],
                $criteria
            ),
        );
    }
    public function clientRoleByName(string $realm, string $clientUuid, string $roleName): RoleRepresentation
    {
        return $this->queryExecutor->executeQuery(
            new Query(
                '/admin/realms/{realm}/clients/{client-uuid}/roles/{role-name}',
                RoleRepresentation::class,
                [
                    'realm' => $realm,
                    'client-uuid' => $clientUuid,
                    'role-name' => $roleName,
                ],

            ),
        );
    }
    public function createClientRole(string $realm, string $clientUuid, RoleRepresentation|array $role): RoleRepresentation
    {
       if (! $role instanceof RoleRepresentation) {
            $role = RoleRepresentation::from($role);
        }
        $this->commandExecutor->executeCommand(
            new Command(
                '/admin/realms/{realm}/clients/{client-uuid}/roles',
                Method::POST,
                [
                    'realm' => $realm,
                    'client-uuid' => $clientUuid,
                ],
                $role,
            ),
        );

        return $this->clientRoleByName($realm, $clientUuid, $role->name);
    }

    public function updateClientRole(string $realm,  string $clientUuid, RoleRepresentation|array $role): RoleRepresentation
    {
        if (! $role instanceof RoleRepresentation) {
            $role = RoleRepresentation::from($role);
        }

        $this->commandExecutor->executeCommand(
            new Command(
                '/admin/realms/{realm}/clients/{client-uuid}/roles/{role-name}',
                Method::PUT,
                [
                    'realm' => $realm,
                    'client-uuid' => $clientUuid,
                    'role-name' => $role->getName(),
                ],
                $role,
            ),
        );

        return $this->clientRoleByName($realm, $clientUuid, $role->name);
    }


    public function deleteClientRole(string $realm, string $clientUuid, string $roleName) : ResponseInterface
    {
        return $this->commandExecutor->executeCommand(
            new Command(
                '/admin/realms/{realm}/clients/{client-uuid}/roles/{role-name}',
                Method::DELETE,
                [
                    'realm' => $realm,
                    'client-uuid' => $clientUuid,
                    'role-name' => $roleName,
                ],
            ),
        );
    }


    public function getIdFromResponse(ResponseInterface $response): ?string
    {
        // Location: http://keycloak:8080/admin/realms/master/clients/999a5022-e757-4f5f-ba0e-1d3ccd601c34
        $location = $response->getHeaderLine('Location');

        preg_match('~/clients/(?<id>[a-z0-9\-]+)$~', $location, $matches);

        return $matches['id'] ?? null;
    }
}
