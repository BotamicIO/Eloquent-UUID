<?php

/*
 * This file is part of Eloquent UUID.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BrianFaust\Uuid;

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

    public static function create(): UuidOptions
    {
        return new static();
    }

    /**
     * @param string $fieldName
     *
     * @return \BrianFaust\Uuid\UuidOptions
     */
    public function saveTo(string $fieldName): UuidOptions
    {
        $this->uuidField = $fieldName;

        return $this;
    }

    /**
     * @param string $strategy
     *
     * @return \BrianFaust\Uuid\UuidOptions
     */
    public function useStrategy(string $strategy): UuidOptions
    {
        $this->strategy = $strategy;

        return $this;
    }

    /**
     * @param string $namespace
     *
     * @return \BrianFaust\Uuid\UuidOptions
     */
    public function withNamespace(string $namespace): UuidOptions
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return \BrianFaust\Uuid\UuidOptions
     */
    public function withName(string $name): UuidOptions
    {
        $this->name = $name;

        return $this;
    }
}
