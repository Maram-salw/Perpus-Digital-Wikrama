<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Transport;

use Symfony\Component\Mailer\Exception\InvalidArgumentException;

/**
 * @author Konstantin Myakshin <molodchick@gmail.com>
 */
final class Dsn
{
    private string $scheme;
    private string $host;
    private ?string $user;
    private ?string $password;
    private ?int $port;
    private array $options;

<<<<<<< HEAD
    public function __construct(string $scheme, string $host, string $user = null, string $password = null, int $port = null, array $options = [])
=======
    public function __construct(string $scheme, string $host, ?string $user = null, #[\SensitiveParameter] ?string $password = null, ?int $port = null, array $options = [])
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
    {
        $this->scheme = $scheme;
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->port = $port;
        $this->options = $options;
    }

    public static function fromString(string $dsn): self
    {
<<<<<<< HEAD
        if (false === $parsedDsn = parse_url($dsn)) {
            throw new InvalidArgumentException(sprintf('The "%s" mailer DSN is invalid.', $dsn));
        }

        if (!isset($parsedDsn['scheme'])) {
            throw new InvalidArgumentException(sprintf('The "%s" mailer DSN must contain a scheme.', $dsn));
        }

        if (!isset($parsedDsn['host'])) {
            throw new InvalidArgumentException(sprintf('The "%s" mailer DSN must contain a host (use "default" by default).', $dsn));
=======
        if (false === $params = parse_url($dsn)) {
            throw new InvalidArgumentException('The mailer DSN is invalid.');
        }

        if (!isset($params['scheme'])) {
            throw new InvalidArgumentException('The mailer DSN must contain a scheme.');
        }

        if (!isset($params['host'])) {
            throw new InvalidArgumentException('The mailer DSN must contain a host (use "default" by default).');
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
        }

        $user = '' !== ($params['user'] ?? '') ? rawurldecode($params['user']) : null;
        $password = '' !== ($params['pass'] ?? '') ? rawurldecode($params['pass']) : null;
        $port = $params['port'] ?? null;
        parse_str($params['query'] ?? '', $query);

        return new self($params['scheme'], $params['host'], $user, $password, $port, $query);
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getPort(?int $default = null): ?int
    {
        return $this->port ?? $default;
    }

    public function getOption(string $key, mixed $default = null)
    {
        return $this->options[$key] ?? $default;
    }
}
