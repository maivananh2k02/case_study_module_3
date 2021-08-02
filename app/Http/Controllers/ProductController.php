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
        $product = Product::join('category_product', 'category_product.id_category', '=', 'Products.category_id')
            ->join('brands', 'brands.id_brand', '=', 'Products.brand_id')
            ->get();

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
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->content = $request->content_product;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->status = $request->status;
        $image = $request->file('image');
        $newImage = $image->getClientOriginalname();
        $image->move('uploads/product', $newImage);
        $product->image = $newImage;
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
        $category = Category::all();
        $brand = Brand::all();
        $showProduct = Product::where('id', $id)->first();
        return view('admin.edit_product', compact('showProduct', 'category', 'brand'));
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        if ($image) {
            $newImage = $image->getClientOriginalname();
            $image->move('uploads/product', $newImage);
            Product::where('id', $id)->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'content' => $request->content_product,
                'price' => $request->price,
                'image' => $newImage
            ]);
            return redirect()->route('admin.showProduct');
        } else {
            Product::where('id', $id)->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'content' => $request->content_product,
                'price' => $request->price,
            ]);
            return redirect()->route('admin.showProduct');
        }
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('admin.showProduct');
    }

    public function detail($id)
    {
        $category = Category::where('status_category', '1')->get();
        $brand = Brand::where('status_brand', '1')->get();
        $detail_product = Product::join('category_product', 'category_product.id_category', '=', 'Products.category_id')
            ->join('brands', 'brands.id_brand', '=', 'Products.brand_id')
            ->where('Products.id', $id)
            ->get();

        $relatedProducts=Product::where('category_id',$detail_product[0]->category_id)->get();
//        dd($relatedProducts);
        return view('pages.product.detail_product', compact('category', 'brand', 'detail_product','relatedProducts'));
    }
}
