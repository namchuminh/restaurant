<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class WebCustomerController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        
    }

    public function login(Request $request){
        if ($request->isMethod('post')) {
            $credentials = $request->only('login', 'password');
    
            $loginType = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
            $credentials = [$loginType => $credentials['login'], 'password' => $credentials['password']];
    
            $user = User::where($loginType, $credentials[$loginType])->first();
    
            if ($user && $user->status == 0) {
                return redirect()->back()->withErrors(['login' => 'Tài khoản của bạn đã bị cấm khỏi hệ thống!']);
            }
    
            if (Auth::attempt($credentials)) {
                $userId = Auth::id();
                session(['user_id' => $userId]);
                return redirect()->route('web.customer.index');
            }
    
            return redirect()->back()->withErrors(['login' => 'Sai tài khoản hoặc mật khẩu!']);
        }
    
        return view('web.customer.login');
    }

    public function logout(){
        session()->forget('user_id');
        Auth::logout();
        return redirect()->route('web.customer.login');
    }

    public function register(Request $request){
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'phone' => 'required|string|max:15|unique:users',
            ], [
                'name.required' => 'Tên là bắt buộc.',
                'email.required' => 'Email là bắt buộc.',
                'email.email' => 'Email không hợp lệ.',
                'email.unique' => 'Email đã tồn tại.',
                'password.required' => 'Mật khẩu là bắt buộc.',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
                'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
                'phone.required' => 'Số điện thoại là bắt buộc.',
                'phone.unique' => 'Số điện thoại đã tồn tại.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => 0,
                'status' => 1,
                'phone' => $request->input('phone'),
            ]);

            return redirect()->route('web.customer.login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập.');
        }

        return view('web.customer.register');
    }
}
