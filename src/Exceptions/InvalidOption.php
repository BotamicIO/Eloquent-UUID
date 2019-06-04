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

namespace Artisanry\Uuid\Exceptions;

use Exception;

class InvalidOption extends Exception
{
    public static function missingUuidField(): self
    {
        return new static('Could not determinate in which field the uuid should be saved');
    }
}
