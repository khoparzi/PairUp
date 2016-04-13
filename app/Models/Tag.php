<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * Get profiles for the tag
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Profile', 'profiles_tags');
    }
}
