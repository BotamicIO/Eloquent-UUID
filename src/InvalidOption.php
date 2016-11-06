<?php

namespace BrianFaust\Uuid;

use Exception;

class InvalidOption extends Exception
{
    public static function missingUuidField()
    {
        return new static('Could not determinate in which field the uuid should be saved');
    }
}
