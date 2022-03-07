<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('admin.brands.brand', compact('brands'));
    }

    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required',
        ], [
            'brand_name.required' => 'Mohon diisi nama Merek',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brands/'.$name_gen);
        $save_url = 'upload/brands/' . $name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            'brand_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Brand Berhasil Ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function BrandEdit($id) {
        $brands = Brand::findOrFail($id);
        return view('admin.brands.brand-edit', compact('brands'));
    
    }

    public function BrandUpdate(Request $request) {
        $brand_id = $request->id;
        $old_img = $request->old_image;
        
        if ($request->file('brand_image')) {
            unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brands/'.$name_gen);
            $save_url = 'upload/brands/' . $name_gen;
    
            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
                'brand_image' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'Brand Berhasil Diperbarui!',
                'alert-type' => 'info'
            );
    
            return redirect()->route('brand.view')->with($notification);
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            ]);
    
            $notification = array(
                'message' => 'Brand Berhasil Diperbarui!',
                'alert-type' => 'info'
            );
    
            return redirect()->route('brand.view')->with($notification);
        }
    }

    public function BrandDelete($id) {
        $brands = Brand::findOrFail($id);
        $img = $brands->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Berhasil Dihapus!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
