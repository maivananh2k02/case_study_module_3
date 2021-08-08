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
        if (Session::get('admin_id')) {
            return view('admin.add_brand');
        } else {
            return redirect()->route('login');
        }

    }

    public function showBrand()
    {
        if (Session::get('admin_id')) {
            $brand = Brand::all();
            return view('admin.show_brand', compact('brand'));
        } else {
            return redirect()->route('login');
        }
    }

    public function saveBrand(Request $request)
    {
        if (Session::get('admin_id')) {
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
            return redirect()->route('admin.showBrand')->with('success_saveBrand', 'Thêm thương hiệu thành công');
        } else {
            return redirect()->route('login');
        }
    }

    public function un_action($id)
    {
        if (Session::get('admin_id')) {
            Brand::where('id_brand', $id)->update(['status_brand' => 1]);
            return redirect()->route('admin.showBrand')->with('display_brand_danger', 'Ẩn hiển thị thương hiệu thành công');
        } else {
            return redirect()->back();
        }
    }

    public function action($id)
    {
        if (Session::get('admin_id')) {
            Brand::where('id_brand', $id)->update(['status_brand' => 0]);
            return redirect()->route('admin.showBrand')->with('display_brand_success', 'Ẩn hiển thị thương hiệu thành công');
        } else {
            return redirect()->back();
        }
    }

    public function showFileUpdate($id)
    {
        if (Session::get('admin_id')) {
            $showBrand = Brand::where('id_brand', $id)->first();
            return view('admin.edit_brand', compact('showBrand'));
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        if (Session::get('admin_id')) {
            Brand::where('id_brand', $id)->update(['name_brand' => $request->name, 'desc_brand' => $request->desc]);
            return redirect()->route('admin.showBrand');
        } else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        if (Session::get('admin_id')) {
            Brand::where('id_brand', $id)->delete();
            return redirect()->route('admin.showBrand');
        } else {
            return redirect()->back();
        }
    }

}
