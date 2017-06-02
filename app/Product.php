<?php

namespace huerta;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


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

    /**
     * Get the comments for the blog post.
     */
    public function savePicture($file)
    {
        $ext = $file->guessClientExtension();
        $name = str_random(10).$this->id.$this->name.'.'.$ext;
        $this->picture = $name;
        $file->storeAs('products/'.$this->user_id, $name);
        $this->save();
    }

    public function getPictureUrl()
    {
        return Storage::disk('s3')->url('products/'.$this->user_id.'/'.$this->picture);
    }
}
