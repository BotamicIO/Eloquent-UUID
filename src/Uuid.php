<?php

/*
 * This file is part of Eloquent UUID.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Eloquent\Uuid;

use Ramsey\Uuid\Uuid as RamseyUuid;

/**
 * Class Uuid.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class Uuid
{
    /**
     * @var
     */
    private $uuid;

    /**
     * Uuid constructor.
     *
     * @param $uuid
     */
    public function __construct($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @param $strategy
     *
     * @return Uuid
     */
    public static function fromRandom($strategy)
    {
        $uuid = RamseyUuid::{$strategy}();

        return new self($uuid);
    }

    /**
     * @param $strategy
     * @param $namespace
     * @param $name
     *
     * @return Uuid
     */
    public static function fromName($strategy, $namespace, $name)
    {
        $uuid = RamseyUuid::{$strategy}($namespace, $name);

        return new self($uuid);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->uuid;
    }
}
