<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function get_province(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 7671a0a4a75e102840fce3ed48398c53"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $data_pengirim = $response['rajaongkir']['results'];
            return $data_pengirim;
        }
    }

    public function get_city($id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 7671a0a4a75e102840fce3ed48398c53"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $data_kota = $response['rajaongkir']['results'];
            return json_encode($data_kota);
        }
    }

    public function get_ongkir($origin, $destination, $weight, $courier) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 7671a0a4a75e102840fce3ed48398c53"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $data_ongkir = $response['rajaongkir']['results'];
            return json_encode($data_ongkir);
        }
    }

    public function CheckoutCreate(){
        if  (Auth::check()) {
            if (Cart::total() > 0) {
            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartSubtotal = Cart::subtotal();
            $provinsi = $this->get_province();

        return view('frontend.checkout',compact('carts', 'cartQty', 'cartSubtotal', 'provinsi'));

            } else {

            $notification = array(
            'message' => 'Shopping At list One Product',
            'alert-type' => 'error'
        );

        return redirect()->to('/')->with($notification);
            }

        } else {

            $notification = array(
            'message' => 'Silahkan Login Terlebih Dahulu!',
            'alert-type' => 'error'
        );

        return redirect()->route('login')->with($notification);
        }
    }

    public function CheckoutStore(Request $request) {
        // dd($request->all());
    	$data = array();
    	$data['name'] = $request->name;
    	$data['email'] = $request->email;
    	$data['phone'] = $request->phone;
    	$data['postcode'] = $request->postcode;
    	$data['address'] = $request->address;

    	$data['nama_provinsi'] = $request->nama_provinsi;
    	$data['nama_kota'] = $request->nama_kota;
    	$data['kurir'] = $request->kurir;
    	$data['service'] = $request->service;

    	$data['totalberat'] = $request->totalberat;
    	$data['totalongkir'] = $request->totalongkir;
    	$data['totalbelanja'] = $request->totalbelanja;
    	$data['totalbayar'] = $request->totalbayar;

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartSubtotal = Cart::subtotal();

        if ($request->payment_method == 'cod') {
    		return view('frontend.cod', compact('data', 'carts', 'cartQty', 'cartSubtotal'));
    	} elseif ($request->payment_method == 'manual'){
            return view('frontend.manual', compact('data', 'carts', 'cartQty', 'cartSubtotal'));
    	} else {
            return view('frontend.midtrans', compact('data'));
        }
    }
}
