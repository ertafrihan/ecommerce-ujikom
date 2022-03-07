<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function PayCash(Request $request) {

        DB::beginTransaction();

        try {
            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'postcode' => $request->postcode,
                'address' => $request->address,
    
                'nama_provinsi' => $request->nama_provinsi,
                'nama_kota' => $request->nama_kota,
                'kurir' => $request->kurir,
                'service' => $request->service,
                
                'totalqty' => $request->totalqty,
                'totalberat' => $request->totalberat,
                'totalongkir' => $request->totalongkir,
                'totalbelanja' => $request->totalbelanja,
                'totalbayar' => $request->totalbayar,
                'payment_method' => 'Cash on Delivery',             
                
                'order_number' => mt_rand(10000000,99999999),
                'invoice_number' => 'INV'.mt_rand(10000000,99999999),
                'order_date' => Carbon::now()->format('d F Y'),
                'order_month' => Carbon::now()->format('F'),
                'order_year' => Carbon::now()->format('Y'),
                'order_status' => 'Diproses',
                'shipping_status' => 'Dikemas',
                'created_at' => Carbon::now(),
            ]);
    
            $carts = Cart::content();
            foreach ($carts as $cart) {
                OrderItem::insert([
                    'order_id' => $order_id, 
                    'product_id' => $cart->id,
                    'color' => $cart->options->color,
                    'size' => $cart->options->size,
                    'qty' => $cart->qty,
                    'weight' => $cart->weight,
                    'price' => $cart->price,
                    'created_at' => Carbon::now(),
                ]);
            }

            DB::commit();
    
            Cart::destroy();
    
            $notification = array(
                'message' => 'Terima kasih! Pesanan Berhasil Dibuat.',
                'alert-type' => 'success'
            );
    
            return view('frontend.success')->with($notification);
        
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function PayManual(Request $request) {

        DB::beginTransaction();

        try {
            $image = $request->file('bukti_pembayaran');
    	    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	    Image::make($image)->resize(500,637)->save('upload/orders/'.$name_gen);
    	    $save_url = 'upload/orders/'.$name_gen;
            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'postcode' => $request->postcode,
                'address' => $request->address,
    
                'nama_provinsi' => $request->nama_provinsi,
                'nama_kota' => $request->nama_kota,
                'kurir' => $request->kurir,
                'service' => $request->service,
                
                'totalqty' => $request->totalqty,
                'totalberat' => $request->totalberat,
                'totalongkir' => $request->totalongkir,
                'totalbelanja' => $request->totalbelanja,
                'totalbayar' => $request->totalbayar,
                'payment_method' => 'Bank Transfer Manual',             
                'bukti_pembayaran' => $save_url,
                
                'order_number' => mt_rand(10000000,99999999),
                'invoice_number' => 'INV'.mt_rand(10000000,99999999),
                'order_date' => Carbon::now()->format('d F Y'),
                'order_month' => Carbon::now()->format('F'),
                'order_year' => Carbon::now()->format('Y'),
                'order_status' => 'Diproses',
                'shipping_status' => 'Dikemas',
                'created_at' => Carbon::now(),
            ]);
    
            $carts = Cart::content();
            foreach ($carts as $cart) {
                OrderItem::insert([
                    'order_id' => $order_id, 
                    'product_id' => $cart->id,
                    'color' => $cart->options->color,
                    'size' => $cart->options->size,
                    'qty' => $cart->qty,
                    'weight' => $cart->weight,
                    'price' => $cart->price,
                    'created_at' => Carbon::now(),
                ]);
            }

            DB::commit();
    
            Cart::destroy();
    
            $notification = array(
                'message' => 'Terima kasih! Pesanan Berhasil Dibuat.',
                'alert-type' => 'success'
            );
    
            return view('frontend.success')->with($notification);
        
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
