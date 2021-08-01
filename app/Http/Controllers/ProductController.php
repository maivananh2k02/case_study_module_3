<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //
    public function addProduct()
    {
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.add_product', compact('category', 'brand'));
    }

    public function showProduct()
    {
        $product = Product::all();

        return view('admin.show_product', compact('product'));
    }

    public function saveProduct(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:Products,name'
            ],
            [
                'name.required' => 'vui long nhap ten loai san pham',
                'name.unique' => 'san pham da ton tai'
            ]);
        $product = new Product();
        $product->name=$request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->content = $request->content_product;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->status = $request->status;
        $image=$request->file('image');
        $newImage=$image->getClientOriginalname();
        $image->move('uploads/product',$newImage);
        $product->image=$newImage;
        $product->save();
        Session::put('message', 'them danh muc thanh cong');
        return redirect()->route('admin.showProduct');
    }

    public function un_action($id)
    {
        Product::where('id', $id)->update(['status' => 1]);
        return redirect()->route('admin.showProduct');
    }

    public function action($id)
    {
        Product::where('id', $id)->update(['status' => 0]);
        return redirect()->route('admin.showProduct');
    }

    public function showFileUpdate($id)
    {
        $showProduct = Product::where('id', $id)->first();
        return view('admin.edit_product', compact('showProduct'));
    }

    public function update(Request $request, $id)
    {
        Product::where('id', $id)->update(['name' => $request->name, 'desc' => $request->desc]);
        return redirect()->route('admin.showProduct');
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('admin.showProduct');
    }

}
