<?php

namespace huerta\Http\Controllers\Shop;

use huerta\Shop;
use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use huerta\Product;

class ProductController extends ShopBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $shoppingCart = $this->getShoppingCart();
        $shoppingCart->add($product, $data['quantity']);
        $request->session()->flash('message', 'Product added to shopping cart');

        return redirect('shop/index');
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
}
