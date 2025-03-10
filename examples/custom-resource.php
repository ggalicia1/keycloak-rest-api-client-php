<?php

declare(strict_types=1);

use Overtrue\Keycloak\Keycloak;

/**
 * @method string|null getId()
 * @method self withId(?string $id)
 * @method string getName()
 * @method self|null withName(?string $name)
 */
class MyCustomRepresentation extends \Overtrue\Keycloak\Representation\Representation
{
    public function __construct(
        protected ?string $id = null,
        protected ?string $name = null,
    ) {}
}

class MyCustomResource extends \Overtrue\Keycloak\Resource\Resource
{
    public function myCustomEndpoint(): MyCustomRepresentation
    {
        return $this->queryExecutor->executeQuery(
            new \Overtrue\Keycloak\Http\Query(
                '/my-custom-endpoint',
                MyCustomRepresentation::class,
            ),
        );
    }
}

$keycloak = new Keycloak(
    $_SERVER['KEYCLOAK_BASE_URL'] ?? 'http://keycloak:8080',
    'admin',
    'admin',
);

/** @var MyCustomResource $myCustomResource */
$myCustomResource = $keycloak->resource(MyCustomResource::class);
$myCustomRepresentation = $myCustomResource->myCustomEndpoint();
