<?php

namespace huerta\Http\Controllers\Admin;

use Illuminate\Http\Request;
use huerta\Http\Controllers\Controller;
use huerta\Product;

class ProductController extends AdminBaseController
{
    public function index()
    {
        return view('producer.product.index', ['products' => Product::withTrashed()->paginate(5)]);
    }

    public function restore(int $id)
    {
        $product = Product::withTrashed()->find($id);

        if (!is_null($product)) {
            $product->restore();
        }

        return back();
    }
}
