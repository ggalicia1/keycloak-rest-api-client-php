<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Representation;

/**
 * @codeCoverageIgnore
 */
class OrganizationDomain extends Representation
{
    public function __construct(
        protected ?string $name = null,
        protected ?bool $verified = null,
    ) {}
}
