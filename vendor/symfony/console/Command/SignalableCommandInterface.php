<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Command;

/**
 * Interface for command reacting to signal.
 *
 * @author Grégoire Pineau <lyrixx@lyrix.info>
 */
interface SignalableCommandInterface
{
    /**
     * Returns the list of signals to subscribe.
     */
    public function getSubscribedSignals(): array;

    /**
     * The method will be called when the application is signaled.
<<<<<<< HEAD
=======
     *
     * @param int|false $previousExitCode
     *
     * @return int|false The exit code to return or false to continue the normal execution
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
     */
    public function handleSignal(int $signal): void;
}
