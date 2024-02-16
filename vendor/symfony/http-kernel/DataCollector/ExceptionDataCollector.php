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

use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class ExceptionDataCollector extends DataCollector
{
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function collect(Request $request, Response $response, \Throwable $exception = null)
=======
    public function collect(Request $request, Response $response, ?\Throwable $exception = null): void
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        if (null !== $exception) {
            $this->data = [
                'exception' => FlattenException::createFromThrowable($exception),
            ];
        }
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        $this->data = [];
    }

=======
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    public function hasException(): bool
    {
        return isset($this->data['exception']);
    }

    public function getException(): \Exception|FlattenException
    {
        return $this->data['exception'];
    }

    public function getMessage(): string
    {
        return $this->data['exception']->getMessage();
    }

    public function getCode(): int
    {
        return $this->data['exception']->getCode();
    }

    public function getStatusCode(): int
    {
        return $this->data['exception']->getStatusCode();
    }

    public function getTrace(): array
    {
        return $this->data['exception']->getTrace();
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'exception';
    }
}
