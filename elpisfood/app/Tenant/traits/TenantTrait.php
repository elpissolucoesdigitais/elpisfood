<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;


trait TenantTrait
{
    /**
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::observe(TenantObserver::class);
    }
}
