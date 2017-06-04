<?php

namespace huerta\Http\Controllers\Shop;

use huerta\Shop;
use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use huerta\Product;
use huerta\BuyItem;

class ProductController extends ShopBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id', '!=', Auth::user()->id)->paginate(6);
        return view('shop.index', [
            'products' => $products,
            'shoppingCart' => $this->getShoppingCart(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \huerta\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('shop.show', [
            'product' => $product,
            'shoppingCart' => $this->getShoppingCart(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \huerta\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, Product $product)
    {
        $data = $request->all();
        $validator = $this->validator($data, $this->addRules());
        if ($validator->fails() || $data['quantity'] > $product->stock) {
            return redirect('shop/show/'.$product->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $buyItem = $this->getBuyItem($product);
        $buyItem->quantity += $data['quantity'];
        $product->stock -= $data['quantity'];
        $buyItem->save();
        $product->save();
        $request->session()->flash('message', 'Product added to shopping cart');

        return redirect('shop/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \huerta\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }

    protected function validator(array $data, array $rules)
    {
        return Validator::make($data, $rules);
    }

    protected function addRules()
    {
        return [
            'quantity' => 'required|integer',
        ];
    }

    protected function getBuyItem(Product $product)
    {
        $shoppingCart = $this->getShoppingCart();
        $buyItem = BuyItem::where([
            ['shopping_cart_id', '=', $shoppingCart->id],
            ['product_id', '=', $product->id],
        ])->first();

        if (!is_null($buyItem)) {
            return $buyItem;
        }

        return BuyItem::create([
            'shopping_cart_id' => $shoppingCart->id,
            'product_id' => $product->id,
            'quantity' => 0,
        ]);
    }
}
