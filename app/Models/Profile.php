<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
        return $this->belongsToMany('App\Models\Tag')
            ->withPivot('rating', 'is_seeking', 'is_offering')
            ->withTimestamps();
    }

    /**
     * Return the full name of the profile
     */
    public function full_name()
    {
        return "$this->first_name $this->last_name";
    }

    /**
     * Add a skill
     */
    public function add_tag($tag, $rating=1, $is_offering, $is_seeking = false)
    {
        $this->tags()->attach($tag, [
                'rating'=> $rating,
                'is_seeking'=> $is_seeking,
                'is_offering'=> $is_offering
            ]);
    }
}
