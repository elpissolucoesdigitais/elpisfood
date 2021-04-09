<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table='profiles';
    protected $fillable = ['name','description'];

    /**
     * GET PERMISSION
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

}
