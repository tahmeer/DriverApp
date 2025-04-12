<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Common;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $helper;

    function __construct(Common $helper){
        $this->helper = $helper;
    }
    // protected $helper;
    // function __construct(Common $helper){
    //     $this->helper = $helper;
    // }
    public function login()
    {
        return view('Admin.auth.login');
    }
    public function authenticate(Request $request)
    {
        $admin = Admin::where('email', $request['email'])->first();
        
        if (!empty($admin->status)) {
            if ($admin->status != 0) {
                if (Auth::guard('admin')->attempt(['email' => trim($request['email']), 'password' => trim($request['password'])])) {
                    return redirect()->intended('admin/dashboard');
                } else {
                    $this->helper->one_time_message('danger', 'Please Check Your Email/Password');
                    return redirect('admin/login');
                }
            } else {
                $this->helper->one_time_message('danger', 'You are Blocked.');
                return redirect('admin/login');
            }
        } else {

            $this->helper->one_time_message('danger', 'Please Check Your Email/Password');
            return redirect('admin/login');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('admin/login');
    }
}
