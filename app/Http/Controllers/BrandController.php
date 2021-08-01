<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    //

    public function addBrand()
    {
        return view('admin.add_brand');
    }

    public function showBrand()
    {
        $brand = Brand::all();

        return view('admin.show_brand', compact('brand'));
    }

    public function saveBrand(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:brands,name'
            ],
            [
                'name.required' => 'vui long nhap ten loai san pham',
                'name.unique' => 'san pham da ton tai'
            ]);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->desc = $request->desc;
        $brand->status = $request->status;
        $brand->save();
        Session::put('message', 'them danh muc thanh cong');
        return redirect()->route('admin.showBrand');
    }

    public function un_action($id)
    {
        Brand::where('id', $id)->update(['status' => 1]);
        return redirect()->route('admin.showBrand');
    }

    public function action($id)
    {
        Brand::where('id', $id)->update(['status' => 0]);
        return redirect()->route('admin.showBrand');
    }

    public function showFileUpdate($id)
    {
        $showBrand = Brand::where('id', $id)->first();
        return view('admin.edit_brand', compact('showBrand'));
    }

    public function update(Request $request, $id)
    {
        Brand::where('id', $id)->update(['name' => $request->name, 'desc' => $request->desc]);
        return redirect()->route('admin.showBrand');
    }

    public function delete($id)
    {
        Brand::where('id', $id)->delete();
        return redirect()->route('admin.showBrand');
    }

}
