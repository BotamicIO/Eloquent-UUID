<?php

namespace BrianFaust\Eloquent\Uuid;

use Ramsey\Uuid\Uuid as RamseyUuid;

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
