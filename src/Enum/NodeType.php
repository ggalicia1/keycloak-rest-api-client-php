<?php

declare(strict_types=1);

namespace Overtrue\Keycloak\Enum;

use Overtrue\Keycloak\Attribute\Since;

#[Since(version: '14.0.0')]
enum NodeType: string implements Enum
{
    case ARRAY = 'ARRAY';
    case BINARY = 'BINARY';
    case BOOLEAN = 'BOOLEAN';
    case MISSING = 'MISSING';
    case NULL = 'NULL';
    case NUMBER = 'NUMBER';
    case OBJECT = 'OBJECT';
    case POJO = 'POJO';
    case STRING = 'STRING';
}
