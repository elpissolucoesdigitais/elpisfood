<?php

namespace App\Models;
use App\Tenant\Traits\TenantTrait;
use App\Tenant\Observers\TenantObserver;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use TenantTrait;
    protected $fillable = ['name','description','url','uuid'];

    public function products()
    {
       return $this->belongsToMany(Product::class);
    }
}
