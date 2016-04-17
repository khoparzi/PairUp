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
        return $this->belongsToMany('App\Models\Tag')
            ->withPivot('rating', 'is_seeking', 'is_offering')
            ->withTimestamps();
    }

    /**
     * Add a skill
     */
    public function add_tag($tag, $rating=1, $is_seeking = false, $is_offering)
    {
        $this->tags()->attach($tag, [
                'rating'=> $rating,
                'is_seeking'=> $is_seeking,
                'is_offering'=> $is_offering
            ]);
    }
}
