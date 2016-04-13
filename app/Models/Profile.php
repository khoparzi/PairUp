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
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get skills for a profile
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
