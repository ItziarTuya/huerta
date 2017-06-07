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
        return $this->belongsTo('huerta\User');
    }

    public function products()
    {
        return $this->hasMany('huerta\BuyItem');
    }

    public static function getProductsByUser(User $user)
    {
        return self::where('user_id', '=', $user->id)->paginate(10);
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

    public function getFormatedPrice()
    {
        return number_format($this->price, 2, '.', ',').' €';
    }

    public static function getSoldProducts(User $user)
    {
        return self::join('buy_items', 'products.id', '=', 'buy_items.product_id')
        ->join('shopping_carts', 'shopping_carts.id', '=', 'buy_items.shopping_cart_id')
        ->select('products.*', 'shopping_carts.confirmed_at', 'buy_items.quantity', 'buy_items.buy_price')
        ->where([
            ['shopping_carts.state', '=', 2],
            ['products.user_id', '=', $user->id],
        ])->orderBy('shopping_carts.confirmed_at', 'desc')->paginate(10);
    }
}
