<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends BaseController
{
    public function index($alias, $id)
    {
        $product = Product::findOrFail($id);
        return view('themes.besmart.product', compact('product'));
    }
}
