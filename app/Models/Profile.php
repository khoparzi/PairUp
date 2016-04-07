<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'url', 'country_id'];

    /*
    * Get the profile's user
    */
    function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
