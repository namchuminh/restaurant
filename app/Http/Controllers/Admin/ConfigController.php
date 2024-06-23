<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Config;

class ConfigController extends Controller
{
    public function index(){
        $config = Config::findOrFail(1); // Lấy cấu hình đầu tiên hoặc tạo mới nếu chưa có
        return view('Admin/Config/index', compact('config'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'image|mimes:ico|max:2048',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ], [
            'title.required' => 'Trường tiêu đề là bắt buộc.',
            'title.string' => 'Trường tiêu đề phải là chuỗi.',
            'title.max' => 'Trường tiêu đề không được vượt quá :max ký tự.',
            'description.required' => 'Trường mô tả là bắt buộc.',
            'description.string' => 'Trường mô tả phải là chuỗi.',
            'logo.image' => 'Trường logo phải là file ảnh.',
            'logo.mimes' => 'Trường logo phải có định dạng: jpeg, png, jpg, gif.',
            'logo.max' => 'Dung lượng file logo không được vượt quá :max KB.',
            'favicon.image' => 'Trường favicon phải là file ảnh.',
            'favicon.mimes' => 'Trường favicon phải có định dạng: ico.',
            'favicon.max' => 'Dung lượng file favicon không được vượt quá :max KB.',
            'phone.required' => 'Trường số điện thoại là bắt buộc.',
            'phone.string' => 'Trường số điện thoại phải là chuỗi.',
            'phone.max' => 'Trường số điện thoại không được vượt quá :max ký tự.',
            'email.required' => 'Trường email là bắt buộc.',
            'email.email' => 'Trường email phải là địa chỉ email hợp lệ.',
            'email.max' => 'Trường email không được vượt quá :max ký tự.',
            'address.required' => 'Trường địa chỉ là bắt buộc.',
            'address.string' => 'Trường địa chỉ phải là chuỗi.',
            'address.max' => 'Trường địa chỉ không được vượt quá :max ký tự.',
        ]);

        $config = Config::firstOrFail(); // Lấy cấu hình đầu tiên

        // Cập nhật thông tin từ request
        $config->title = $request->title;
        $config->description = $request->description;
        $config->phone = $request->phone;
        $config->email = $request->email;
        $config->address = $request->address;

        // Xử lý file logo
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/images');
            $config->logo = Storage::url($logoPath);
        }

        // Xử lý file favicon
        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('public/images');
            $config->favicon = Storage::url($faviconPath);
        }

        $config->save();

        return redirect()->route('admin.config.index')->with('success', 'Cập nhật cấu hình thành công!');
    }
    
}
