<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ForgetPassword extends Controller
{
    //

    public function forget_password()
    {
        return view('pages.reset_password');
    }

    public function save_password(Request $request)
    {
        $email = $request->email;
        $checkEmail = Customer::where('customer_email', $email)->first();
        if (!$checkEmail) {
            return redirect()->back();
        } else {
            $code = bcrypt(md5(time() . $email));
            Session::put('customer_code',$code);
            Customer::where('customer_email', $email)->update([
                'customer_code' => $code,
                'time_code' => Carbon::now()
            ]);
            $url = route('formResetPassword', ['customer_code' => $checkEmail->customer_code, 'customer_email' => $email]);

            $details = [
                'url' => $url
            ];
            Mail::to($email)->send(new TestMail($details));
            return 'email send';
        }
    }

    public function formResetPassword()
    {
        return view('pages.reset_password_email');
    }

    public function resetPassword(Request $request)
    {
        $customer_code=Session::get('customer_code');
//        dd( $customer_code);
        Customer::where('customer_code', $customer_code)->update([
            'customer_password' => Hash::make($request->password)
        ]);
        return redirect()->route('pages.home');
    }
}
