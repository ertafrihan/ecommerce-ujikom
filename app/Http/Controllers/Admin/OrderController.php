<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function AllTransaction() {
        $orders = Order::orderBy('id','DESC')->get();
		return view('admin.orders.transactions', compact('orders'));
    }

    public function TransactionDetails($order_id){

		$order = Order::with('user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('admin.orders.transaction-details', compact('order','orderItem'));
	}

    public function OrderStatusUpdate(Request $request){

		$order_id = $request->id;
        
        Order::findOrFail($order_id)->update([
            'shipping_status' => $request->shipping_status,
            'resi' => $request->resi,
            'order_status' => $request->order_status,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
			'message' => 'Status Pesanan Berhasil Diperbarui',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	}
}
