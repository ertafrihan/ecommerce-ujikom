<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\SubCategory;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AddProduct() {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.products.product-add', compact('categories', 'brands'));
    }


    public function ProductStore(Request $request) {

        $image = $request->file('product_thumbnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(500,637)->save('upload/products/thumbnail/'.$name_gen);
    	$save_url = 'upload/products/thumbnail/'.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,

            'product_name' => $request->product_name,
            'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'product_weight' => $request->product_weight,
            'product_price' => $request->product_price,
            'product_discount' => $request->product_discount,
            'product_short_desc' => $request->product_short_desc,
            'product_long_desc' => $request->product_long_desc,
            'product_promo' => $request->product_promo,
  
            'product_thumbnail' => $save_url,
            'product_status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // Product Galleries
        $images = $request->file('product_gallery');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(500,637)->save('upload/products/product-gallery/'.$make_name);
            $uploadPath = 'upload/products/product-gallery/'.$make_name;

            ProductGallery::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(), 
    	    ]);
        }

        $notification = array(
			'message' => 'Produk Berhasil Ditambahkan!',
			'alert-type' => 'success'
		);

		return redirect()->route('manage.product')->with($notification);
    }


    public function ManageProduct(){
		$products = Product::latest()->get();
		return view('admin.products.product-view',compact('products'));
	}


    public function EditProduct($id){
		$productGalleries = ProductGallery::where('product_id',$id)->get();
		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = SubCategory::latest()->get();
		$products = Product::findOrFail($id);
		return view('admin.products.product-edit',compact('categories','brands','subcategory','products','productGalleries'));
	}


    public function ProductUpdate(Request $request){

		$product_id = $request->id;
        
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,

            'product_name' => $request->product_name,
            'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'product_weight' => $request->product_weight,
            'product_price' => $request->product_price,
            'product_discount' => $request->product_discount,
            'product_short_desc' => $request->product_short_desc,
            'product_long_desc' => $request->product_long_desc,
            'product_promo' => $request->product_promo,

            'product_status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
			'message' => 'Data Produk Berhasil Diperbarui',
			'alert-type' => 'success'
		);

		return redirect()->route('manage.product')->with($notification);
	}


    public function ProductImageUpdate(Request $request){
		$pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thumbnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(500,637)->save('upload/products/thumbnail/'.$name_gen);
    	$save_url = 'upload/products/thumbnail/'.$name_gen;

    	Product::findOrFail($pro_id)->update([
    		'product_thumbnail' => $save_url,
    		'updated_at' => Carbon::now(),

    	]);
        
        $notification = array(
			'message' => 'Foto Produk Berhasil Diperbarui',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
	}


    public function ProductGalleryUpdate(Request $request) {
        $imgs = $request->product_gallery;

		foreach ($imgs as $id => $img) {
            $imgDel = ProductGallery::findOrFail($id);
            unlink($imgDel->photo_name);
            
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(500,637)->save('upload/products/product-gallery/'.$make_name);
            $uploadPath = 'upload/products/product-gallery/'.$make_name;

            ProductGallery::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
	    }

        $notification = array(
			'message' => 'Galeri Produk Berhasil Diperbarui',
			'alert-type' => 'info'
		);

        return redirect()->back()->with($notification);
    }


    public function ProductImageDelete($id){
        $oldimg = ProductGallery::findOrFail($id);
        unlink($oldimg->photo_name);
        ProductGallery::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Foto Berhasil Dihapus',
           'alert-type' => 'info'
       );

       return redirect()->back()->with($notification);
    }


    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = ProductGallery::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            ProductGallery::where('product_id',$id)->delete();
        }

        $notification = array(
           'message' => 'Produk Berhasil Dihapus',
           'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ProductInactive($id){
        Product::findOrFail($id)->update(['product_status' => 0]);
        $notification = array(
           'message' => 'Product Nonaktif',
           'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ProductActive($id){
        Product::findOrFail($id)->update(['product_status' => 1]);
        $notification = array(
           'message' => 'Product Aktif',
           'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
