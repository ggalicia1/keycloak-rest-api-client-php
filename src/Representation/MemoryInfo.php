<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Representation;

/**
 * @method int getFree()
 * @method string getFreeFormated()
 * @method int getFreePercentage()
 * @method int getTotal()
 * @method string getTotalFormated()
 * @method int getUsed()
 * @method string getUsedFormated()
 *
 * @codeCoverageIgnore
 */
class MemoryInfo extends Representation
{
    public function __construct(
        protected ?int $free = null,
        protected ?string $freeFormated = null,
        protected ?int $freePercentage = null,
        protected ?int $total = null,
        protected ?string $totalFormated = null,
        protected ?int $used = null,
        protected ?string $usedFormated = null,
    ) {}
}
