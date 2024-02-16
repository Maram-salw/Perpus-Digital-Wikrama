<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\EventDispatcher;

/**
 * A read-only proxy for an event dispatcher.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class ImmutableEventDispatcher implements EventDispatcherInterface
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function dispatch(object $event, string $eventName = null): object
=======
    public function dispatch(object $event, ?string $eventName = null): object
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        return $this->dispatcher->dispatch($event, $eventName);
    }

    /**
     * {@inheritdoc}
     */
    public function addListener(string $eventName, callable|array $listener, int $priority = 0)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
     * {@inheritdoc}
     */
    public function addSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
     * {@inheritdoc}
     */
    public function removeListener(string $eventName, callable|array $listener)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
     * {@inheritdoc}
     */
    public function removeSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function getListeners(string $eventName = null): array
=======
    public function getListeners(?string $eventName = null): array
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        return $this->dispatcher->getListeners($eventName);
    }

    /**
     * {@inheritdoc}
     */
    public function getListenerPriority(string $eventName, callable|array $listener): ?int
    {
        return $this->dispatcher->getListenerPriority($eventName, $listener);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function hasListeners(string $eventName = null): bool
=======
    public function hasListeners(?string $eventName = null): bool
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        return $this->dispatcher->hasListeners($eventName);
    }
}
