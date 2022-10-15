<?php

declare(strict_types=1);

/**
 * This file is part of MaxPHP.
 *
 * @link     https://github.com/marxphp
 * @license  https://github.com/marxphp/max/blob/master/LICENSE
 */

namespace Max\Di\Tests;

use Max\Di\Container;
use Max\Di\Context;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @internal
 * @coversNothing
 */
class ContextTest extends TestCase
{
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        Context::getContainer();
    }

    public function testHasContainer()
    {
        $this->assertTrue(Context::hasContainer());
    }

    public function testGetContainer()
    {
        $this->assertTrue(Context::getContainer() instanceof ContainerInterface);
    }

    public function testSetContainer()
    {
        Context::setContainer(new Container());
        $this->assertTrue(Context::getContainer() instanceof ContainerInterface);
    }
}
