<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    //
    public function addCategory()
    {
        return view('admin.add_category');
    }

    public function showCategory()
    {
        $category = Category::all();

        return view('admin.show_category', compact('category'));
    }

    public function saveCategory(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:category_product,name_category'
            ],
            [
                'name.required' => 'vui long nhap ten loai san pham',
                'name.unique' => 'san pham da ton tai'
            ]);
        $category = new Category();
        $category->name_category = $request->name;
        $category->desc_category = $request->desc;
        $category->status_category = $request->status;
        $category->save();
        Session::put('message', 'them danh muc thanh cong');
        return redirect()->route('admin.showCategory');
    }

    public function un_action($id)
    {
        Category::where('id_category', $id)->update(['status_category' => 1]);
        Session::put('message', 'Khong kich hoat danh muc thanh cong');
        return redirect()->route('admin.showCategory');
    }

    public function action($id)
    {
        Category::where('id_category', $id)->update(['status_category' => 0]);
        Session::put('message', 'kich hoat danh muc thanh cong');
        return redirect()->route('admin.showCategory');
    }

    public function showFileUpdate($id)
    {
        $showCategory = Category::where('id_category', $id)->first();
        return view('admin.edit_category', compact('showCategory'));
    }

    public function update(Request $request, $id)
    {
        Category::where('id_category', $id)->update(['name_category' => $request->name, 'desc_category' => $request->desc]);

        return redirect()->route('admin.showCategory');
    }

    public function delete($id)
    {
        Category::where('id_category', $id)->delete();
        return redirect()->route('admin.showCategory');
    }

    public function showCategoryHome($id)
    {
        $category = Category::where('status_category','1')->get();
        $brand = Brand::where('status_brand','1')->get();
        $categoryById=Product::join('category_product', 'category_product.id_category', '=', 'Products.category_id')
            ->where('Products.category_id',$id)
            ->get();
        $category_name=Category::where('id_category',$id)->first();
        return view('pages.show_category',compact('category','brand','categoryById','category_name'));
    }
    public function showBrandHome($id)
    {
        $category = Category::where('status_category','1')->get();
        $brand = Brand::where('status_brand','1')->get();
        $brandById=Product::join('brands', 'brands.id_brand', '=', 'Products.brand_id')
            ->where('Products.brand_id',$id)
            ->get();

        $brand_name=Brand::where('id_brand',$id)->first();

        return view('pages.show_brand',compact('category','brand','brandById','brand_name'));
    }
}
