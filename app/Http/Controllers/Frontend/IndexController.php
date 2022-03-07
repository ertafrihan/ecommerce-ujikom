<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
	public function UserProfile(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.user-profile', compact('user'));
    }

	public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
		$data->name = $request->name;
		$data->email = $request->email;
		$data->phone = $request->phone;
		$data->address = $request->address;
		$data->postcode = $request->postcode;
 

		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/user-images/'.$data->profile_photo_path));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/user-images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => 'Profil Berhasil Diperbarui.',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);

    }

    public function index() {
        $products = Product::where('product_status',1)->orderBy('id','DESC')->limit(9)->get();
    	$categories = Category::orderBy('category_name','ASC')->get();

        return view('frontend.home', compact('products', 'categories'));
    }

    public function about() {
        return view('frontend.about');
    }

    public function contact() {
        return view('frontend.contact');
    }

    public function faq() {
        return view('frontend.faq');
    }


    public function ProductDetails($id, $slug) {
        $product = Product::with('brand', 'category')->findOrFail($id);

		$color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_size;
		$product_size = explode(',', $size);

		$product_gallery = ProductGallery::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(4)->get();
	 	return view('frontend.product-details',compact('product','product_gallery','product_color','product_size','relatedProduct'));
    }


    // Product View With Ajax
	public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_size;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,
		));
    }
}
