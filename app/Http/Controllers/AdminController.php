<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.admin_login');
    }

    public function home()
    {
        if (Session::get('admin_id')) {
            return view('admin.home');
        } else {
            return redirect()->route('login');
        }
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {

        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => 'vui long nhap email',
                'email.email' => 'vui long nhap dung kieu email',
                'password.required' => 'vui long nhap password',
                'password.min' => 'it nhat la 6 ki tu',
                'password.max' => 'k qua 20 ki tu'
            ]
        );
        $checkLogin = Admin::where('email', $request->email)->first();
        if ($checkLogin) {
            if (Hash::check($request->password, $checkLogin['password'])) {
                Session::put('name', $checkLogin->name);
                Session::put('email', $checkLogin->email);
                Session::put('gender', $checkLogin->gender);
                Session::put('admin_id', $checkLogin->id);
                return redirect()->route('admin.home')->with('success_home', 'Đăng nhập thành công');
            } else {
                return redirect()->back()->with('defeat_home_password', 'Đăng nhập thất bại do sai mật khẩu');
            }
        } else {
            return redirect()->back()->with('defeat_home_email', 'Đăng nhập thất bại do sai email');
        }
    }


    public function showRegister()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'name' => 'required',
                'r_password' => 'required|same:password'
            ],
            [
                'email.required' => 'vui long nhap email',
                'email.email' => 'vui long nhap dung dinh dang email',
                'email.unique' => 'email da ton tai',
                'password.required' => 'vui long nhap email',
                'password.min' => 'it nhat 6 ki tu',
                'password.max' => 'password khong qua 20 ki tu',
                'name.required' => 'vui long nhap ten',
                'r_password.required' => 'vui long nhap lai vao r_password',
                'r_password.same' => 'mat khau k trung'
            ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->route('login')->with('success_register', 'Tạo tài khoản thành công');
    }

    public function logOut()
    {
        Session::forget('admin_id');
        return redirect()->route('login')->with('success_logOut', 'Đăng xuất thành công');
    }

    public function showProfile()
    {
        if (Session::get('admin_id')) {
            return view('admin.proFile');
        } else {
            return redirect()->route('login');
        }
    }
}
