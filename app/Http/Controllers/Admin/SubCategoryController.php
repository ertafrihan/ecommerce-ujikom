<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin.categories.subcategory', compact('subcategories', 'categories'));
    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ], [
            'category_id.required' => 'Mohon pilih salah satu Kategori',
            'subcategory_name.required' => 'Mohon diisi nama Sub Kategori',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        $notification = array(
            'message' => 'Sub Kategori Berhasil Ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id) {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subcategories = SubCategory::findOrFail($id);
        return view('admin.categories.subcategory-edit', compact('subcategories', 'categories'));
    
    }

    public function SubCategoryUpdate(Request $request) {
        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        $notification = array(
            'message' => 'Sub Kategori Berhasil Diperbarui!',
            'alert-type' => 'info'
        );

        return redirect()->route('subcategory.view')->with($notification);
    }

    public function SubCategoryDelete($id) {
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub Kategori Berhasil Dihapus!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    // ajax
    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
    }
}
