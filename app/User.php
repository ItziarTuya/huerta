<?php

namespace huerta;

use huerta\Product;
use huerta\ShoppingCart;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function products()
    {
        return $this->hasMany('huerta\Product');
    }

    public function shoppingCarts()
    {
        return $this->hasMany('huerta\ShoppingCart');
    }

    public function isCustomer()
    {
        return $this->role == 1;
    }

    public function isProducer()
    {
        return $this->role == 2;
    }

    public function isAdmin()
    {
        return $this->role == 3;
    }

    public function isProductOwner(Product $product)
    {
        return $this->id == $product->user_id;
    }

    public function isShoppingCartOwner(ShoppingCart $shoppingCart)
    {
        return $this->id == $shoppingCart->user_id;
    }
}
