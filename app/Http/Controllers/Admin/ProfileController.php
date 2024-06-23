<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('Admin/Profile/index', compact('user'));
    }

    public function update(Request $request){
        $user = Auth::user();

        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ];

        // If password is provided, add password validation
        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:4';
        }

        $messages = [
            'name.required' => 'Trường tên là bắt buộc.',
            'name.string' => 'Trường tên phải là chuỗi.',
            'name.max' => 'Trường tên không được vượt quá :max ký tự.',
            'phone.required' => 'Trường số điện thoại là bắt buộc.',
            'phone.string' => 'Trường số điện thoại phải là chuỗi.',
            'phone.max' => 'Trường số điện thoại không được vượt quá :max ký tự.',
            'email.required' => 'Trường email là bắt buộc.',
            'email.email' => 'Trường email phải là địa chỉ email hợp lệ.',
            'email.max' => 'Trường email không được vượt quá :max ký tự.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.required' => 'Trường mật khẩu là bắt buộc.',
            'password.string' => 'Trường mật khẩu phải là chuỗi.',
            'password.min' => 'Trường mật khẩu phải có ít nhất :min ký tự.',
        ];

        $request->validate($rules, $messages);

        // Update user information
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;

        // If password is provided, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.profile.index')->with('success', 'Cập nhật thông tin thành công!');
    }
}
