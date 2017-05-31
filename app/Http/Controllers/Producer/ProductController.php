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
        $this->middleware('productOwner', ['except' => ['index', 'create', 'store']]);
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
            'price' => 'required|numeric',
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
        $data = $request->all();
        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect('producer/product/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            Product::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'picture' => 'url',
                'price' => $data['price'],
                'stock' => $data['stock'],
                'category' => $data['category'],
                'user_id' => Auth::user()->id,
            ]);
        }

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
        return view('producer.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \huerta\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('producer.product.edit', ['product' => $product]);
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
        $productData = $request->all();
        $validator = $this->validator($productData);

        if ($validator->fails()) {
            return redirect('/producer/product/'.$product->id.'/edit')
                ->withErrors($validator);
        }

        $product->name = $productData['name'];
        $product->description = $productData['description'];
        $product->price = $productData['price'];
        $product->stock = $productData['stock'];
        $product->category = $productData['category'];
        $product->save();

        return redirect('/producer/product/'.$product->id.'/show');
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
