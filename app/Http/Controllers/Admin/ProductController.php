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
}
