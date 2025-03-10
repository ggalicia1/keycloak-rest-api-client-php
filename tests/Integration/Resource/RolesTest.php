<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Test\Integration\Resource;

use Exception;
use Overtrue\Keycloak\Http\Criteria;
use Overtrue\Keycloak\Representation\Role;
use Overtrue\Keycloak\Test\Integration\IntegrationTestBehaviour;
use PHPUnit\Framework\TestCase;

class RolesTest extends TestCase
{
    use IntegrationTestBehaviour;

    public function test_create_retrieve_update_delete_role(): void
    {
        $resource = $this->getKeycloak()->roles();

        // Get all roles
        $allRoles = $resource->all('master');
        static::assertGreaterThanOrEqual(1, $allRoles->count());
        $role = $allRoles->first();
        static::assertInstanceOf(Role::class, $role);

        // Create role
        $resource->create(
            'master',
            new Role(name: 'test-role', description: 'test-role-description'),
        );

        // Search (created) role
        $role = $resource->all('master', new Criteria([
            'search' => 'test-role',
        ]))->first();
        static::assertInstanceOf(Role::class, $role);
        static::assertEquals('test-role', $role->getName());

        // Get single (created) role
        $role = $resource->get('master', 'test-role');
        static::assertSame('test-role', $role->getName());

        // Update (created) role
        $resource->update('master', $role->withDescription('updated-test-role-description'));

        // Delete (created) role
        $resource->delete('master', 'test-role');

        try {
            $resource->get('master', 'test-role');
            static::fail('Role should not exist anymore');
        } catch (Exception $e) {
            static::assertSame(404, $e->getCode());
        }
    }
}
