<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Order;
use App\Models\Table;

class WebCustomerController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->paginate(10);

        // Chuẩn bị dữ liệu phân trang thủ công
        $currentPage = $orders->currentPage();
        $lastPage = $orders->lastPage();
        $total = $orders->total();
        $perPage = $orders->perPage();

        $tables = Table::orderBy('id', 'DESC')->get();
    
        return view('web.customer.index', compact('orders', 'currentPage', 'lastPage', 'total', 'perPage', 'tables'));
    }

    public function update(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'required|string|max:20|unique:users,phone,'.$user->id,
            'password' => 'nullable|string|min:6',
        ], [
            'name.required' => 'Họ tên là bắt buộc.',
            'name.string' => 'Họ tên phải là chuỗi ký tự.',
            'name.max' => 'Họ tên không được vượt quá :max ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không được vượt quá :max ký tự.',
            'email.unique' => 'Email đã được sử dụng.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá :max ký tự.',
            'phone.unique' => 'Số điện thoại đã được sử dụng.',
            'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công.');
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
