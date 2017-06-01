<?php

namespace huerta;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];


    protected $guarded = [];

    /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->hasOne('huerta\User');
    }
}
