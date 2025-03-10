<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Test\Integration\Resource;

use GuzzleHttp\Exception\ServerException;
use Overtrue\Keycloak\Collection\OrganizationDomainCollection;
use Overtrue\Keycloak\Representation\Organization;
use Overtrue\Keycloak\Representation\OrganizationDomain;
use Overtrue\Keycloak\Representation\Realm;
use Overtrue\Keycloak\Test\Integration\IntegrationTestBehaviour;
use PHPUnit\Framework\TestCase;

class OrganizationsTest extends TestCase
{
    use IntegrationTestBehaviour;

    private const REALM = 'organizations-tests';

    public function test_organizations(): void
    {
        $this->skipIfKeycloakVersionIsLessThan('26.0.0');

        // Create realm
        $this->getKeycloak()->realms()->import(new Realm(realm: self::REALM, organizationsEnabled: true));

        // No organizations exist yet in realm
        $organizations = $this->getKeycloak()->organizations()->all(self::REALM);
        static::assertCount(0, $organizations);

        // Create a new organization in realm
        $createdOrganization = new Organization(
            name: 'created-organization',
            domains: new OrganizationDomainCollection([
                new OrganizationDomain('foo.bar', true),
                new OrganizationDomain('bar.foo', false),
            ]),
        );
        $this->getKeycloak()->organizations()->create(self::REALM, $createdOrganization);

        $organizations = $this->getKeycloak()->organizations()->all(self::REALM);
        static::assertCount(1, $organizations);
        static::assertSame($createdOrganization->getName(), $organizations->first()->getName());

        // Get newly created organization
        $organization = $this->getKeycloak()->organizations()->get(self::REALM, $organizations->first()->getId());
        static::assertSame($createdOrganization->getName(), $organization->getName());

        try {
            // Invite user to newly created organization
            $this->getKeycloak()->organizations()->inviteUser(
                self::REALM,
                $organizations->first()->getId(),
                'john@doe.com',
                'John',
                'Doe',
            );
        } catch (ServerException $e) {
            // Error is expected as SMTP is not configured
            static::assertSame(500, $e->getCode());
            static::assertSame(
                ['errorMessage' => 'Failed to send invite email'],
                json_decode($e->getResponse()->getBody()->getContents(), true, flags: JSON_THROW_ON_ERROR),
            );
        }

        // Delete newly created organization
        $this->getKeycloak()->organizations()->delete(self::REALM, $organizations->first()->getId());
        $organizations = $this->getKeycloak()->organizations()->all(self::REALM);
        static::assertCount(0, $organizations);

        // Delete realm
        $this->getKeycloak()->realms()->delete(self::REALM);
    }
}
