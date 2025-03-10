<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Representation;

/**
 * @method string|null getCondition()
 * @method self withCondition(?string $condition)
 * @method JsonNode|null getConfiguration()
 * @method self withConfiguration(?JsonNode $configuration)
 *
 * @codeCoverageIgnore
 */
class ClientPolicyCondition extends Representation
{
    public function __construct(
        protected ?string $condition = null,
        protected ?JsonNode $configuration = null,
    ) {}
}
