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
                'name' => 'required|unique:brands,name_brand'
            ],
            [
                'name.required' => 'vui long nhap ten loai san pham',
                'name.unique' => 'san pham da ton tai'
            ]);
        $brand = new Brand();
        $brand->name_brand = $request->name;
        $brand->desc_brand = $request->desc;
        $brand->status_brand = $request->status;
        $brand->save();
        Session::put('message', 'them danh muc thanh cong');
        return redirect()->route('admin.showBrand');
    }

    public function un_action($id)
    {
        Brand::where('id_brand', $id)->update(['status_brand' => 1]);
        return redirect()->route('admin.showBrand');
    }

    public function action($id)
    {
        Brand::where('id_brand', $id)->update(['status_brand' => 0]);
        return redirect()->route('admin.showBrand');
    }

    public function showFileUpdate($id)
    {
        $showBrand = Brand::where('id_brand', $id)->first();
        return view('admin.edit_brand', compact('showBrand'));
    }

    public function update(Request $request, $id)
    {
        Brand::where('id_brand', $id)->update(['name_brand' => $request->name, 'desc_brand' => $request->desc]);
        return redirect()->route('admin.showBrand');
    }

    public function delete($id)
    {
        Brand::where('id_brand', $id)->delete();
        return redirect()->route('admin.showBrand');
    }

}
