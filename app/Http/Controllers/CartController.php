<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ShoppingCart;
use App\Models\UserCart;

class CartController extends BaseController
{
    public function index()
    {
        $cartItems = ShoppingCart::getCartItems();
        return view('themes.besmart.cart', compact('cartItems'));
    }

    public function addToCart($product_id)
    {
        ShoppingCart::add($product_id);
        return redirect()->route('cart.index');
    }

    public function addToCart2($product_id)
    {
        ShoppingCart::add($product_id);
        return redirect()->back();
    }

    public function add(Request $request)
    {
        $quantity = abs($request->input('quantity'));
        $product_id = (int) $request->input('product_id');
        ShoppingCart::add($product_id, $quantity);
        return redirect()->route('cart.index');
    }

    public function delete($product_id)
    {
        ShoppingCart::deleteFromCartItem($product_id);
        return redirect()->back();
    }
}
