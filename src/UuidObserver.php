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

use Illuminate\Database\Eloquent\Model;

/**
 * Class UuidObserver.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class UuidObserver
{
    /**
     * @param Model $model
     */
    public function creating(Model $model)
    {
        $model->generateUuid();
    }
}
