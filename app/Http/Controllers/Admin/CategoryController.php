<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.category', compact('categories'));
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name.required' => 'Mohon diisi nama Kategori',
            'category_icon.required' => 'Mohon diisi Ikon class fontawesome',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Kategori Berhasil Ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id) {
        $categories = Category::findOrFail($id);
        return view('admin.categories.category-edit', compact('categories'));
    }

    public function CategoryUpdate(Request $request) {
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Kategori Berhasil Diperbarui!',
            'alert-type' => 'info'
        );

        return redirect()->route('category.view')->with($notification);
    }

    public function CategoryDelete($id) {
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Kategori Berhasil Dihapus!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
