<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
        $product = Product::findOrFail($id);

        Cart::add([
            'id' => $id, 
            'name' => $request->product_name, 
            'qty' => $request->product_qty, 
            'price' => $product->product_price,
            'weight' => $product->product_weight, 
            'options' => [
                'image' => $product->product_thumbnail,
                'color' => $request->product_color,
                'size' => $request->product_size,
            ], 
        ]);

        return response()->json(['success' => 'Produk Ditambahkan ke Keranjang']);    
    }


    public function AddMiniCart(){
    	$carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartSubtotal = Cart::subtotal();

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartSubtotal' => round($cartSubtotal),
    	));
    }

    public function RemoveMiniCart($rowId){
    	Cart::remove($rowId);
    	return response()->json(['success' => 'Produk Dihapus dari Keranjang']);

    }
}
