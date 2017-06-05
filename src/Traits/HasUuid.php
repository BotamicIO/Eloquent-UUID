<?php

/*
 * This file is part of Eloquent UUID.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Uuid\Traits;

use BrianFaust\Uuid\Exceptions\InvalidOption;
use BrianFaust\Uuid\UuidOptions;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

trait HasUuid
{
    /** @var \BrianFaust\Uuid\UuidOptions */
    protected $uuidOptions;

    /**
     * Get the options for generating the uuid.
     */
    public function getUuidOptions(): UuidOptions
    {
        return UuidOptions::create();
    }

    /**
     * Boot the trait.
     */
    protected static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            $model->addUuid();
        });
    }

    /**
     * Add the uuid to the model.
     */
    protected function addUuid()
    {
        $this->uuidOptions = $this->getUuidOptions();

        $this->guardAgainstInvalidUuidOptions();

        $uuid = $this->generateUuid();

        $uuid = $this->makeUuidUnique($uuid);

        $uuidField = $this->uuidOptions->uuidField;

        $this->$uuidField = (string) $uuid;
    }

    /**
     * Generate a non unique uuid for this record.
     */
    protected function generateUuid(): string
    {
        $strategy = $this->uuidOptions->strategy;

        if (in_array($strategy, ['uuid3', 'uuid5'])) {
            return Uuid::{$strategy}(
                $this->uuidOptions->namespace,
                $this->uuidOptions->name
            );
        }

        return Uuid::{$strategy}();
    }

    /**
     * Make the given uuid unique.
     */
    protected function makeUuidUnique(string $uuid): string
    {
        while ($this->otherRecordExistsWithUuid($uuid) || $uuid === '') {
            $uuid = $this->generateUuid();
        }

        return $uuid;
    }

    /**
     * Determine if a record exists with the given uuid.
     */
    protected function otherRecordExistsWithUuid(string $uuid): bool
    {
        return (bool) static::where($this->uuidOptions->uuidField, $uuid)
            ->where($this->getKeyName(), '!=', $this->getKey() ?? '0')
            ->first();
    }

    /**
     * This function will throw an exception when any of the options is missing or invalid.
     */
    protected function guardAgainstInvalidUuidOptions()
    {
        if (!strlen($this->uuidOptions->uuidField)) {
            throw InvalidOption::missingUuidField();
        }
    }
}
