<?php

namespace huerta;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use huerta\Product;
use huerta\BuyItem;

class ShoppingCart extends Model
{
    protected $fillable = [
        'user_id', 'state',
    ];

    public function user()
    {
        return $this->belongsTo('huerta\User')->withTrashed();
    }

    public function buyItems()
    {
        return $this->hasMany('huerta\BuyItem');
    }

    public static function getCurrentShoppingCart()
    {
        return self::where([
            ['state', '=', 1],
            ['user_id', '=', Auth::user()->id],
        ])->first();
    }


    public static function getShoppingCarts()
    {
        return self::where([
            ['state', '=', 2], //vendido
            ['user_id', '=', Auth::user()->id],
        ])->orderBy('confirmed_at', 'desc')->paginate(5);
    }


    public function getNumItems(){
        return $this->buyItems->sum('quantity');
    }


    public function getTotalPrice()
    {
        $totalPrice = 0;

        foreach ($this->buyItems as $buyItem)
        {
            $totalPrice += $buyItem->getTotalPrice();   //Sumatorio del precio de los productos del carrito.
        }

        return $totalPrice;
    }


    public function getFormatedTotalPrice()
    {
        return number_format($this->getTotalPrice(), 2, '.', ',').' €';
    }


    public function isPending()
    {
        return $this->state == 1;
    }

    public function isConfirmed()
    {
        return $this->state == 2;
    }

    public function confirm($full_address)
    {
        $this->full_address = $full_address;
        $this->state = 2;
        $this->confirmed_at = Carbon::now()->toDateTimeString();
        $this->save();
    }

    public function add(Product $product, $quantity)
    {
        $buyItem = $this->getBuyItem($product);
        $buyItem->quantity += $quantity;
        $product->stock -= $quantity;
        $buyItem->save();
        $product->save();
    }

    public function subtract(BuyItem $buyItem)
    {
        $product = $buyItem->product;
        $product->stock += $buyItem->quantity;
        $product->save();
        $buyItem->delete();
    }

    protected function getBuyItem(Product $product)
    {
        $buyItem = BuyItem::where([
            ['shopping_cart_id', '=', $this->id],
            ['product_id', '=', $product->id],
        ])->first();

        if (!is_null($buyItem)) {
            return $buyItem;
        }

        return BuyItem::create([
            'shopping_cart_id' => $this->id,
            'product_id' => $product->id,
            'buy_price' => $product->price,
            'quantity' => 0,
        ]);
    }

    public function clear()
    {
        foreach ($this->buyItems as $buyItem) {     //$this->buyItems; Productos del carrito.
            $this->subtract($buyItem);
        }
    }
}
