<?php

namespace BrianFaust\Eloquent\Uuid;

use Illuminate\Database\Eloquent\Model;

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
