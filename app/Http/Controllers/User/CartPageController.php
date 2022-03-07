<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartPageController extends Controller
{
    public function MyCart() {
        $cartQty = Cart::count();
        $cartSubtotal = Cart::subtotal();
        return view('frontend.mycart', compact('cartSubtotal', 'cartQty'));
    }


    public function GetCartProduct(){
        $carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartSubtotal = Cart::subtotal();

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartSubtotal' => round($cartSubtotal),
    	));
    }


	public function RemoveCartProduct($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Produk Dihapus dari Keranjang']);
    }


	public function CartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        return response()->json('increment');
    }


    public function CartDecrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        return response()->json('decrement');
    }
}
