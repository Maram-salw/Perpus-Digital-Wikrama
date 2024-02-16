<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Provider;

use Symfony\Component\Translation\Exception\InvalidArgumentException;
use Symfony\Component\Translation\Exception\MissingRequiredOptionException;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class Dsn
{
    private ?string $scheme;
    private ?string $host;
    private ?string $user;
    private ?string $password;
    private ?int $port;
    private ?string $path;
    private array $options = [];
    private string $originalDsn;

    public function __construct(string $dsn)
    {
        $this->originalDsn = $dsn;

<<<<<<< HEAD
        if (false === $parsedDsn = parse_url($dsn)) {
            throw new InvalidArgumentException(sprintf('The "%s" translation provider DSN is invalid.', $dsn));
        }

        if (!isset($parsedDsn['scheme'])) {
            throw new InvalidArgumentException(sprintf('The "%s" translation provider DSN must contain a scheme.', $dsn));
=======
        if (false === $params = parse_url($dsn)) {
            throw new InvalidArgumentException('The translation provider DSN is invalid.');
        }

        if (!isset($params['scheme'])) {
            throw new InvalidArgumentException('The translation provider DSN must contain a scheme.');
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
        }
        $this->scheme = $params['scheme'];

<<<<<<< HEAD
        if (!isset($parsedDsn['host'])) {
            throw new InvalidArgumentException(sprintf('The "%s" translation provider DSN must contain a host (use "default" by default).', $dsn));
=======
        if (!isset($params['host'])) {
            throw new InvalidArgumentException('The translation provider DSN must contain a host (use "default" by default).');
>>>>>>> 6824861dc37871b6d9adc282a23e55ea8f13ddd7
        }
        $this->host = $params['host'];

        $this->user = '' !== ($params['user'] ?? '') ? rawurldecode($params['user']) : null;
        $this->password = '' !== ($params['pass'] ?? '') ? rawurldecode($params['pass']) : null;
        $this->port = $params['port'] ?? null;
        $this->path = $params['path'] ?? null;
        parse_str($params['query'] ?? '', $this->options);
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

    public function getRequiredOption(string $key)
    {
        if (!\array_key_exists($key, $this->options) || '' === trim($this->options[$key])) {
            throw new MissingRequiredOptionException($key);
        }

        return $this->options[$key];
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function getOriginalDsn(): string
    {
        return $this->originalDsn;
    }
}
