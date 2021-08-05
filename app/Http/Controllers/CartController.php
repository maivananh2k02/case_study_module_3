<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //

    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
//        print_r($cart);
//        die();
        if ($cart) {
            $check = 0;
            foreach ($cart as $key => $value) {
                if ($value['id'] == $data['cart_product_id']) {
                    $check++;
                }
            }
            if ($check == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'name' => $data['cart_product_name'],
                    'id' => $data['cart_product_id'],
                    'image' => $data['cart_product_image'],
                    'qty' => $data['cart_product_qty'],
                    'price' => $data['cart_product_price']
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'name' => $data['cart_product_name'],
                'id' => $data['cart_product_id'],
                'image' => $data['cart_product_image'],
                'qty' => $data['cart_product_qty'],
                'price' => $data['cart_product_price']
            );
        }
        Session::put('cart', $cart);
        Session::save();
    }

    public function show_cart_ajax(Request $request)
    {
        $meta_desc = 'gio hang cua ban';
        $meta_keywords = 'gio hang ajax';
        $meta_title = 'gio hang ajax';
        $url_canonical = $request->url();

        $category = Category::where('status_category', '1')->get();
        $brand = Brand::where('status_brand', '1')->get();

        return view('pages.cart.show_cart', compact('category', 'brand', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical'));
    }

    public function delete_cart($id)
    {
        $cart = Session::get('cart');
        if ($cart) {
            foreach ($cart as $item => $value) {
                if ($value['session_id'] == $id) {
//                    dd($value['session_id']);
                    unset($cart[$item]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'xoa thanh cong');
        } else {
            return redirect()->back()->with('message', 'xoa that bai');
        }
    }

    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart) {
            foreach ($data as $item => $value) {
                foreach ($cart as $session => $i) {
                    if ($i['session_id'] == $item) {
                        $cart[$session]['qty'] = $value;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'thanh cong');
        }
    }

    public function delete_cart_all()
    {
        $cart = Session::get('cart');
        if ($cart) {
//            Session::destroy();
            Session::forget('cart');
            return redirect()->back()->with('message', 'thanh cong');
        }
    }

}
