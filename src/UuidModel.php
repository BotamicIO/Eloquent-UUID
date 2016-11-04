<?php

namespace BrianFaust\Eloquent\Uuid;

trait UuidModel
{
    public static function bootUuidModel()
    {
        static::observe(new UuidObserver());
    }

    public function generateUuid()
    {
        $strategy = $this->uuidStrategy();

        switch ($strategy) {
            case 'uuid1':
            case 'uuid4':
                $uuid = Uuid::fromRandom($strategy);
            break;

            case 'uuid3':
            case 'uuid5':
                $uuid = Uuid::fromName($strategy, $this->uuidNamespace(), $this->uuidName());
            break;

            default:
                throw new \InvalidArgumentException('Invalid Uuid strategy specified.');
            break;
        }

        $this->setUuidValue($uuid);
    }

    /**
     * @param Uuid $value
     */
    public function setUuidValue(Uuid $value)
    {
        $this->{$this->uuidField()} = (string) $value;
    }

    /**
     * @return string
     */
    protected function uuidField()
    {
        return 'id';
    }

    /**
     * @return string
     */
    public function uuidStrategy()
    {
        return 'uuid4';
    }

    /**
     * @return mixed
     */
    public function uuidNamespace()
    {
        return \Ramsey\Uuid\Uuid::NAMESPACE_DNS;
    }

    /**
     * @return string
     */
    public function uuidName()
    {
        return 'php.net';
    }

    /**
     * @param Uuid $uuid
     */
    public function setUuidAttribute(Uuid $uuid)
    {
        $this->attributes[$this->uuidField()] = (string) $uuid;
    }

    /**
     * @return Uuid
     */
    public function getUuidAttribute()
    {
        return new Uuid($this->attributes[$this->uuidField()]);
    }
}
