<?php

declare(strict_types=1);

/**
 * This file is part of MaxPHP.
 *
 * @link     https://github.com/marxphp
 * @license  https://github.com/marxphp/max/blob/master/LICENSE
 */

namespace Max\Routing\Annotations;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Controller
{
    /**
     * @param string $prefix      前缀
     * @param array  $middlewares 中间件
     */
    public function __construct(
        public string $prefix = '/',
        public array $middlewares = []
    ) {
    }
}
