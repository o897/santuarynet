<?php

namespace App\Models\Traits;

use Ramsey\Uuid\Uuid as PackageUuid;

trait Uuid
{

    public function scopeUuid($query, $uuid)
    {
        return $query->where($this->getUuidName(), $uuid);
    }

    public function getUuidName()
    {
        return property_exists($this, 'uuidName') ? $this->uuidName : 'uuid';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getUuidName()} = PackageUuid::uuid4()->toString();
        });
    }
}