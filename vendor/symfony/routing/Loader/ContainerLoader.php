<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Loader;

use Psr\Container\ContainerInterface;

/**
 * A route loader that executes a service from a PSR-11 container to load the routes.
 *
 * @author Ryan Weaver <ryan@knpuniversity.com>
 */
class ContainerLoader extends ObjectLoader
{
    private $container;

    public function __construct(ContainerInterface $container, ?string $env = null)
    {
        $this->container = $container;
        parent::__construct($env);
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function supports(mixed $resource, string $type = null): bool
=======
    public function supports(mixed $resource, ?string $type = null): bool
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        return 'service' === $type && \is_string($resource);
    }

    /**
     * {@inheritdoc}
     */
    protected function getObject(string $id): object
    {
        return $this->container->get($id);
    }
}
