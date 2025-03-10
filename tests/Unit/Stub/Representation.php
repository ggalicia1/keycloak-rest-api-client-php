<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Test\Unit\Stub;

use Overtrue\Keycloak\Attribute\Since;
use Overtrue\Keycloak\Attribute\Until;
use Overtrue\Keycloak\Type\Map;

/**
 * @method string|null getSince2000()
 * @method string|null getUntil1400()
 * @method string|null getSince1500Until1800()
 * @method Map|null getMap()
 * @method self withSince2000(?string $since2000)
 * @method self withUntil1400(?string $until1400)
 * @method self withSince1500Until1800(?string $since1500Until1800)
 * @method self withMap(?Map $map)
 */
class Representation extends \Overtrue\Keycloak\Representation\Representation
{
    #[Since('20.0.0')]
    protected ?string $since2000 = null;

    #[Until('14.0.0')]
    protected ?string $until1400 = null;

    #[Since('15.0.0'), Until('18.0.0')]
    protected ?string $since1500Until1800 = null;

    protected ?Map $map = null;

    public function __construct(
        ?string $since2000 = null,
        ?string $until1400 = null,
        ?string $since1500Until1800 = null,
        ?Map $map = null,
    ) {
        $this->since2000 = $since2000;
        $this->until1400 = $until1400;
        $this->since1500Until1800 = $since1500Until1800;
        $this->map = $map;
    }
}
