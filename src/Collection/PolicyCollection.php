<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Collection;

use Overtrue\Keycloak\Representation\Policy;

/**
 * @extends Collection<Policy>
 *
 * @codeCoverageIgnore
 */
class PolicyCollection extends Collection
{
    public static function getRepresentationClass(): string
    {
        return Policy::class;
    }
}
