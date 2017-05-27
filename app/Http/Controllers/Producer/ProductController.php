<?php

namespace huerta\Http\Controllers\Producer;

use huerta\Product;
use huerta\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('producer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('producer.product.index', ['products' => Auth::user()->products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producer.product.create');
    }

    /**
     * Validate the create product form
     *
     * @param  array Product data
     * @return @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'string',
            'price' => 'required|double',
            'stock' => 'required|integer',
            'category' => 'string',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productData = $request->all();
        $validator = $this->validator($productData);

        if ($validator->fails()) {
            return redirect()->route('producer.product.create')
                ->withErrors($validator);
        }

        Product::create([
            'name' => $productData['name'],
            'description' => $productData['description'],
            'picture' => 'url',
            'price' => $productData['price'],
            'stock' => $productData['stock'],
            'category' => $productData['category'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('producer.products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \huerta\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \huerta\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \huerta\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \huerta\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
