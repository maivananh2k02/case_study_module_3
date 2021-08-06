<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
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
        Session::put('id', $customer->customer_id);
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
            Session::put('customer_id', $check['customer_id']);
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
            Session::put('transport_id', $transport->id);
            Session::put('transport_name', $transport->transport_name);
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

    public function order(Request $request)
    {
        $cart = Session::get('cart');
//        dd($cart);
        if (Session::get('customer_email') && Session::get('customer_password')) {
            $payment = array();
            $payment['payment_method'] = $request->payment_option;
            $payment['payment_status'] = 'dang cho xu ly';
            $payment_id = Payment::insertGetId($payment);


            $order = array();
            $order['customer_id'] = Session::get('customer_id');
            $order['transport_id'] = Session::get('transport_id');
            $order['payment_id'] = $payment_id;
            $order['order_total'] = Session::get('cart_result');
            $order['order_status'] = 'dang cho xu ly';
            $order_id = Order::insertGetId($order);


            foreach ($cart as $item) {
                $order_detail = array();
                $order_detail['order_id'] = $order_id;
                $order_detail['product_id'] = $item['id'];
                $order_detail['product_name'] = $item['name'];
                $order_detail['product_price'] = $item['price'];
                $order_detail['product_sales_quantity'] = $item['qty'];
                OrderDetail::insert($order_detail);
            }
            if ($payment['payment_method'] == 1) {
                Session::forget('cart');
                echo 'Thanh toan ATM thanh cong';
            } else if ($payment['payment_method'] == 2) {
                Session::forget('cart');
                return view('pages.handCash');
            } else {
                Session::forget('cart');
                echo 'the ghi no';
            }

        } else {
            return redirect()->back();
        }
    }

    public function manage_order()
    {
        $product_order = Order::join('customers', 'customers.customer_id', '=', 'orders.customer_id')
            ->get();
        return view('admin.manage_order', compact('product_order'));
    }

    public function view_order($id)
    {
        $view_order = Order::join('customers', 'customers.customer_id', '=', 'orders.customer_id')
            ->join('transports', 'transports.id_transport', '=', 'orders.transport_id')
            ->join('order_detail', 'order_detail.order_id', '=', 'orders.order_id')
            ->where('orders.order_id', $id)
            ->first();
        return view('admin.view_order', compact('view_order'));
        dd($view_order);
    }

    public function deletePayment($id)
    {
        Order::join('customers', 'customers.customer_id', '=', 'orders.customer_id')
            ->join('transports', 'transports.id_transport', '=', 'orders.transport_id')
            ->join('order_detail', 'order_detail.order_id', '=', 'orders.order_id')
            ->where('orders.order_id', $id)
            ->delete();
        return redirect()->back();
    }

}
