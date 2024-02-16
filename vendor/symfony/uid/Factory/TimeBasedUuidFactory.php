<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Uid\Factory;

use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV1;
use Symfony\Component\Uid\UuidV6;

class TimeBasedUuidFactory
{
    /**
     * @var class-string<Uuid&TimeBasedUidInterface>
     */
    private string $class;
    private $node;

    /**
     * @param class-string<Uuid&TimeBasedUidInterface> $class
     */
    public function __construct(string $class, ?Uuid $node = null)
    {
        $this->class = $class;
        $this->node = $node;
    }

<<<<<<< HEAD
    public function create(\DateTimeInterface $time = null): UuidV6|UuidV1
=======
    public function create(?\DateTimeInterface $time = null): Uuid&TimeBasedUidInterface
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        $class = $this->class;

        if (null === $time && null === $this->node) {
            return new $class();
        }

        return new $class($class::generate($time, $this->node));
    }
}
