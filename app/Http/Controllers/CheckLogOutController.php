<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CheckLogOutController extends Controller
{
    //

    public function login_checkOut()
    {
        $category = Category::where('status_category', '1')->get();
        $brand = Brand::where('status_brand', '1')->get();
        $product = Product::where('status', '1')->get();
        return view('pages.check_out_login', compact('category', 'brand', $product));
    }

    public function add_customer(Request $request)
    {
        $customer = new Customer();
        $customer->customer_name = $request->name;
        $customer->customer_email = $request->email;
        $customer->customer_password = Hash::make($request->password);
        $customer->customer_phone = $request->phone;
        $customer->save();
        return redirect()->route('login_check_in')->with('email', $customer->customer_email)->with('password', $request->password);
    }

    public function customer_login(Request $request)
    {
        $customer_email = $request->email;
        $customer_password = $request->password;
        $check = Customer::where('customer_email', $customer_email)->first();
        if (Hash::check($customer_password, $check['customer_password'])) {
            Session::put('customer_email', $customer_email);
            Session::put('customer_password', $customer_password);

            return redirect()->back()->with('message', 'dang nhap thanh cong');
        } else {
            return redirect()->back();
        }
    }

    public function check_out_customer()
    {
        $category = Category::where('status_category', '1')->get();
        $brand = Brand::where('status_brand', '1')->get();
        return view('pages.check_out_product', compact('category', 'brand'));
    }

    public function save_check_out_customer(Request $request)
    {
        if (Session::get('customer_email') && Session::get('customer_password')) {
            $transport = new Transport();
            $transport->transport_name = $request->name;
            $transport->transport_email = $request->email;
            $transport->transport_note = $request->note;
            $transport->transport_phone = $request->phone;
            $transport->transport_address = $request->address;
            $transport->save();
            Session::put('transport_id', $transport->transport_id);
            return redirect()->route('payment');
        } else {
            return redirect()->back();
        }

    }

    public function log_out_customer()
    {
        Session::forget('customer_email');
        Session::forget('customer_password');
        return redirect()->route('pages.home');
    }

    public function payment()
    {
        $category = Category::where('status_category', '1')->get();
        $brand = Brand::where('status_brand', '1')->get();
        return view('pages.payment', compact('category', 'brand'));
    }
}
