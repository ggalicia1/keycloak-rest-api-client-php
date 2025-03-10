<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Test\Unit\Representation;

use Overtrue\Keycloak\Collection\GroupCollection;
use Overtrue\Keycloak\Representation\Group;
use Overtrue\Keycloak\Type\Map;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Group::class)]
class GroupTest extends TestCase
{
    private Group $group;

    protected function setUp(): void
    {
        $subGroup = new Group(
            access: new Map(['acl-a' => true, 'acl-b' => false]),
            attributes: new Map(['attr-1' => 'val-1', 'attr-2' => 'val-2']),
            clientRoles: new Map(['client-role-x' => ['foo', 'bar'], 'client-role-y' => ['foo', 'bar'], 'client-role-z' => ['foo', 'bar']]),
            id: 'unique-id',
            name: 'unique-name',
            path: '/where/am/i',
            realmRoles: ['realm-role-a', 'realm-role-b'],
        );
        $subGroup->withId('unique-id');

        $this->group = new Group(
            access: new Map(['acl-a' => true, 'acl-b' => false]),
            attributes: new Map(['attr-1' => 'val-1', 'attr-2' => 'val-2']),
            clientRoles: new Map(['client-role-x' => ['foo', 'bar'], 'client-role-y' => ['foo', 'bar'], 'client-role-z' => ['foo', 'bar']]),
            id: 'unique-id',
            name: 'unique-name',
            path: '/where/am/i',
            realmRoles: ['realm-role-a', 'realm-role-b'],
            subGroups: new GroupCollection([$subGroup]),
        );
        $this->group->withId('unique-id');
    }

    /**
     * @param  array<string, mixed>  $properties
     */
    #[DataProvider('provideProperties')]
    public function test_can_be_constructed_from_properties(array $properties): void
    {
        $constructedGroup = Group::from($properties);

        static::assertEquals($this->group, $constructedGroup);
    }

    /**
     * @param  array<mixed>  $properties
     */
    #[DataProvider('provideProperties')]
    public function test_can_be_built(array $properties): void
    {
        $builtGroup = new Group;

        foreach ($properties as $property => $value) {
            $builtGroup = $builtGroup->with($property, $value);
        }

        self::assertEquals($this->group, $builtGroup);
    }

    /**
     * @return array<mixed>
     */
    public static function provideProperties(): array
    {
        $group = [
            'access' => new Map([
                'acl-a' => true,
                'acl-b' => false,
            ]),
            'attributes' => new Map([
                'attr-1' => 'val-1',
                'attr-2' => 'val-2',
            ]),
            'clientRoles' => new Map([
                'client-role-x' => ['foo', 'bar'],
                'client-role-y' => ['foo', 'bar'],
                'client-role-z' => ['foo', 'bar'],
            ]),
            'id' => 'unique-id',
            'name' => 'unique-name',
            'path' => '/where/am/i',
            'realmRoles' => [
                'realm-role-a',
                'realm-role-b',
            ],
        ];

        $subGroup = Group::from($group);

        $group['subGroups'] = new GroupCollection([$subGroup]);

        return [[$group]];
    }
}
