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
    protected function validator(array $data, array $rules)
    {
        return Validator::make($data, $rules);
    }

    protected function storeRules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'string',
            'picture' => 'required|mimes:png,jpg,jpeg,bmp',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'string',
        ];
    }

    protected function updateRules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'string',
            'picture' => 'mimes:png,jpg,jpeg,bmp',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'string',
        ];
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
        $validator = $this->validator($data, $this->storeRules());

        if ($validator->fails()) {
            return redirect()->route('producer.product.create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $product = Product::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'stock' => $data['stock'],
                'category' => $data['category'],
                'user_id' => Auth::user()->id,
            ]);
            $product->savePicture($request->file('picture'));
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
        $validator = $this->validator($productData, $this->updateRules());

        if ($validator->fails()) {
            return redirect('/producer/products/'.$product->id.'/edit')
                ->withErrors($validator);
        }

        $product->name = $productData['name'];
        $product->description = $productData['description'];
        $product->price = $productData['price'];
        $product->stock = $productData['stock'];
        $product->category = $productData['category'];
        $product->save();

        if ($request->hasFile('picture')) {
            $product->savePicture($request->file('picture'));
        }

        return redirect('/producer/products/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \huerta\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        $request->session()->flash('message', 'Product delete succsessfully');
        return redirect('/producer/products/');
    }
}
