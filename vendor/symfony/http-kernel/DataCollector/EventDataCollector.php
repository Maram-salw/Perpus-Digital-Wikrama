<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\Service\ResetInterface;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @see TraceableEventDispatcher
 *
 * @final
 */
class EventDataCollector extends DataCollector implements LateDataCollectorInterface
{
    private $dispatcher;
    private $requestStack;
    private $currentRequest = null;

<<<<<<< HEAD
    public function __construct(EventDispatcherInterface $dispatcher = null, RequestStack $requestStack = null)
    {
        $this->dispatcher = $dispatcher;
        $this->requestStack = $requestStack;
    }

    /**
     * {@inheritdoc}
     */
    public function collect(Request $request, Response $response, \Throwable $exception = null)
=======
    /**
     * @param iterable<EventDispatcherInterface>|EventDispatcherInterface|null $dispatchers
     */
    public function __construct(
        iterable|EventDispatcherInterface|null $dispatchers = null,
        private ?RequestStack $requestStack = null,
        private string $defaultDispatcher = 'event_dispatcher',
    ) {
        if ($dispatchers instanceof EventDispatcherInterface) {
            $dispatchers = [$this->defaultDispatcher => $dispatchers];
        }
        $this->dispatchers = $dispatchers ?? [];
    }

    public function collect(Request $request, Response $response, ?\Throwable $exception = null): void
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        $this->currentRequest = $this->requestStack && $this->requestStack->getMainRequest() !== $request ? $request : null;
        $this->data = [
            'called_listeners' => [],
            'not_called_listeners' => [],
            'orphaned_events' => [],
        ];
    }

    public function reset()
    {
        parent::reset();

        if ($this->dispatcher instanceof ResetInterface) {
            $this->dispatcher->reset();
        }
    }

    public function lateCollect()
    {
        if ($this->dispatcher instanceof TraceableEventDispatcher) {
            $this->setCalledListeners($this->dispatcher->getCalledListeners($this->currentRequest));
            $this->setNotCalledListeners($this->dispatcher->getNotCalledListeners($this->currentRequest));
            $this->setOrphanedEvents($this->dispatcher->getOrphanedEvents($this->currentRequest));
        }

        $this->data = $this->cloneVar($this->data);
    }

    /**
     * @see TraceableEventDispatcher
     */
    public function setCalledListeners(array $listeners)
    {
        $this->data['called_listeners'] = $listeners;
    }

    /**
     * @see TraceableEventDispatcher
     */
<<<<<<< HEAD
    public function getCalledListeners(): array|Data
=======
    public function setCalledListeners(array $listeners, ?string $dispatcher = null): void
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        return $this->data['called_listeners'];
    }

    /**
     * @see TraceableEventDispatcher
     */
<<<<<<< HEAD
    public function setNotCalledListeners(array $listeners)
=======
    public function getCalledListeners(?string $dispatcher = null): array|Data
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        $this->data['not_called_listeners'] = $listeners;
    }

    /**
     * @see TraceableEventDispatcher
     */
<<<<<<< HEAD
    public function getNotCalledListeners(): array|Data
    {
        return $this->data['not_called_listeners'];
=======
    public function setNotCalledListeners(array $listeners, ?string $dispatcher = null): void
    {
        $this->data[$dispatcher ?? $this->defaultDispatcher]['not_called_listeners'] = $listeners;
    }

    /**
     * @see TraceableEventDispatcher
     */
    public function getNotCalledListeners(?string $dispatcher = null): array|Data
    {
        return $this->data[$dispatcher ?? $this->defaultDispatcher]['not_called_listeners'] ?? [];
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    }

    /**
     * @param array $events An array of orphaned events
     *
     * @see TraceableEventDispatcher
     */
<<<<<<< HEAD
    public function setOrphanedEvents(array $events)
=======
    public function setOrphanedEvents(array $events, ?string $dispatcher = null): void
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        $this->data['orphaned_events'] = $events;
    }

    /**
     * @see TraceableEventDispatcher
     */
<<<<<<< HEAD
    public function getOrphanedEvents(): array|Data
=======
    public function getOrphanedEvents(?string $dispatcher = null): array|Data
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        return $this->data['orphaned_events'];
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'events';
    }
}
