<?php

declare(strict_types=1);

/**
 * This file is part of MarxPHP.
 *
 * @link     https://github.com/next-laboratory
 * @license  https://github.com/next-laboratory/next/blob/master/LICENSE
 */

namespace Next\Event;

use Next\Event\Contract\EventListenerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Psr\EventDispatcher\StoppableEventInterface;

class EventDispatcher implements EventDispatcherInterface
{
    public function __construct(
        protected ListenerProviderInterface $listenerProvider
    ) {
    }

    /**
     * @template T
     * @return T
     * @var    T
     */
    public function dispatch(object $event)
    {
        /** @var EventListenerInterface $listener */
        foreach ($this->listenerProvider->getListenersForEvent($event) as $listener) {
            $listener->process($event);
            if ($event instanceof StoppableEventInterface && $event->isPropagationStopped()) {
                break;
            }
        }
        return $event;
    }
}
