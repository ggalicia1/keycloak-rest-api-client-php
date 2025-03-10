<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Representation;

use Overtrue\Keycloak\Collection\PolicyCollection;
use Overtrue\Keycloak\Collection\ResourceCollection;
use Overtrue\Keycloak\Collection\ScopeCollection;
use Overtrue\Keycloak\Enum\DecisionStrategy;
use Overtrue\Keycloak\Enum\PolicyEnforcementMode;

/**
 * @method bool|null getAllowRemoteResourceManagement()
 * @method self withAllowRemoteResourceManagement(?bool $allowRemoveResourceManagement)
 * @method string|null getClientId()
 * @method self withClientId(?string $clientId)
 * @method DecisionStrategy|null getDecisionStrategy()
 * @method self withDecisionStrategy(?DecisionStrategy $decisionStrategy)
 * @method string|null getId()
 * @method self withId(?string $id)
 * @method string|null getName()
 * @method self withName(?string $name)
 * @method PolicyCollection|null getPolicies()
 * @method self withPolicies(?PolicyCollection $policies)
 * @method PolicyEnforcementMode|null getPolicyEnforcementMode()
 * @method self withPolicyEnforcementMode(?PolicyEnforcementMode $policyEnforcementMode)
 * @method ResourceCollection|null getResources()
 * @method self withResources(?ResourceCollection $resources)
 * @method ScopeCollection|null getScopes()
 * @method self withScopes(?ScopeCollection $scopes)
 *
 * @codeCoverageIgnore
 */
class ResourceServer extends Representation
{
    public function __construct(
        protected ?bool $allowRemoteResourceManagement = null,
        protected ?string $clientId = null,
        protected ?DecisionStrategy $decisionStrategy = null,
        protected ?string $id = null,
        protected ?string $name = null,
        protected ?PolicyCollection $policies = null,
        protected ?PolicyEnforcementMode $policyEnforcementMode = null,
        protected ?ResourceCollection $resources = null,
        protected ?ScopeCollection $scopes = null,
    ) {}
}
