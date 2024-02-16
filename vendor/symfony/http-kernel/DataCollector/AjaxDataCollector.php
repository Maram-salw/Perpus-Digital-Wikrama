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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Bart van den Burg <bart@burgov.nl>
 *
 * @final
 */
class AjaxDataCollector extends DataCollector
{
<<<<<<< HEAD
    public function collect(Request $request, Response $response, \Throwable $exception = null)
=======
    public function collect(Request $request, Response $response, ?\Throwable $exception = null): void
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        // all collecting is done client side
    }

    public function reset()
    {
        // all collecting is done client side
    }

    public function getName(): string
    {
        return 'ajax';
    }
}
