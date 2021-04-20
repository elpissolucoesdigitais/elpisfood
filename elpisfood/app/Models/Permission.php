<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable= ['name','description'];

    /**
     * GET PROFILE
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
    /**
     * GET Roles
     */
    public function roles()
    {
        return $this->belongsToMany(Roles::class);
    }
}
