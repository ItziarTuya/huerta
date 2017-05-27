<?php

namespace huerta;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->hasOne('huerta\User');
    }
}
