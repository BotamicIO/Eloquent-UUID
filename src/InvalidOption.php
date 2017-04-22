<?php



declare(strict_types=1);



namespace BrianFaust\Uuid;

use Exception;

class InvalidOption extends Exception
{
    public static function missingUuidField(): self
    {
        return new static('Could not determinate in which field the uuid should be saved');
    }
}
