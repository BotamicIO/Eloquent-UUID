<?php

declare(strict_types=1);

/*
 * This file is part of Eloquent UUID.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Uuid;

use Ramsey\Uuid\Uuid;

class UuidOptions
{
    /** @var string */
    public $uuidField = 'uuid';

    /** @var string */
    public $strategy = 'uuid4';

    /** @var string */
    public $namespace = Uuid::NAMESPACE_DNS;

    /** @var string */
    public $name = 'php.net';

    public static function create(): self
    {
        return new static();
    }

    /**
     * @param string $fieldName
     *
     * @return \Artisanry\Uuid\UuidOptions
     */
    public function saveTo(string $fieldName): self
    {
        $this->uuidField = $fieldName;

        return $this;
    }

    /**
     * @param string $strategy
     *
     * @return \Artisanry\Uuid\UuidOptions
     */
    public function useStrategy(string $strategy): self
    {
        $this->strategy = $strategy;

        return $this;
    }

    /**
     * @param string $namespace
     *
     * @return \Artisanry\Uuid\UuidOptions
     */
    public function withNamespace(string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return \Artisanry\Uuid\UuidOptions
     */
    public function withName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
