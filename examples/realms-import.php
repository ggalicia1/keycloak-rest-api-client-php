<?php

declare(strict_types=1);

use Overtrue\Keycloak\Keycloak;
use Overtrue\Keycloak\Representation\Realm;

require_once __DIR__.'/../vendor/autoload.php';

$keycloak = new Keycloak(
    baseUrl: $_SERVER['KEYCLOAK_BASE_URL'] ?? 'http://keycloak:8080',
    username: 'admin',
    password: 'admin',
);

$random = bin2hex(random_bytes(length: 8));

$keycloak->realms()->import(
    new Realm(
        displayName: 'My Random Realm '.$random,
        id: 'my-random-realm-'.$random,
        realm: 'my-random-realm-'.$random,
    ),
);
