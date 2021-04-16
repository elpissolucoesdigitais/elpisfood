<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','category','description','url'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
