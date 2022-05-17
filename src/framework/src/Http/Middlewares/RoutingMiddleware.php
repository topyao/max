<?php

declare(strict_types=1);

/**
 * This file is part of the Max package.
 *
 * (c) Cheng Yao <987861463@qq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Max\Framework\Http\Middlewares;

use Max\Context\Context;
use Max\Routing\Exceptions\MethodNotAllowedException;
use Max\Routing\Exceptions\RouteNotFoundException;
use Max\Routing\Route;
use Max\Routing\RouteCollector;
use Psr\Container\ContainerExceptionInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use ReflectionException;

class RoutingMiddleware implements MiddlewareInterface
{
    /**
     * @param RouteCollector $routeCollector
     */
    public function __construct(protected RouteCollector $routeCollector)
    {
    }

    /**
     * @param ServerRequestInterface  $request
     * @param RequestHandlerInterface $handler
     *
     * @return ResponseInterface
     * @throws ContainerExceptionInterface
     * @throws MethodNotAllowedException
     * @throws ReflectionException
     * @throws RouteNotFoundException
     * @throws \Max\Http\Exceptions\HttpException
     * @throws \Max\Http\Exceptions\InvalidRequestHandlerException
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        Context::put(Route::class, $route = $this->routeCollector->resolve($request));;
        $handler->unshift($route->getMiddlewares());

        return $handler->handle($request);
    }
}
