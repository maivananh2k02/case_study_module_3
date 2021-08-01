<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
                'name' => 'required|unique:category_product,name'
            ],
            [
                'name.required' => 'vui long nhap ten loai san pham',
                'name.unique' => 'san pham da ton tai'
            ]);
        $category = new Category();
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->status = $request->status;
        $category->save();
        Session::put('message', 'them danh muc thanh cong');
        return redirect()->route('admin.showCategory');
    }

    public function un_action($id)
    {
        Category::where('id', $id)->update(['status' => 1]);
        Session::put('message', 'Khong kich hoat danh muc thanh cong');
        return redirect()->route('admin.showCategory');
    }

    public function action($id)
    {
        Category::where('id', $id)->update(['status' => 0]);
        Session::put('message', 'kich hoat danh muc thanh cong');
        return redirect()->route('admin.showCategory');
    }

    public function showFileUpdate($id)
    {
        $showCategory = Category::where('id', $id)->first();
        return view('admin.edit_category', compact('showCategory'));
    }

    public function update(Request $request, $id)
    {
        Category::where('id', $id)->update(['name' => $request->name, 'desc' => $request->desc]);
        return redirect()->route('admin.showCategory');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('admin.showCategory');
    }

}
