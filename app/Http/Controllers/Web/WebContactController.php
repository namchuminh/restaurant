<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class WebContactController extends Controller
{
    public function index(){
        return view('web.contact.index');
    }

    public function contact(Request $request){
        if (!Auth::check()) {
            return redirect()->route('web.customer.login')->withErrors(['login' => 'Bạn cần đăng nhập hệ thống để gửi liên hệ!']);
        }

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'type' => 'required|integer',
                'content' => 'required|string',
            ], [
                'type.required' => 'Loại liên hệ là bắt buộc.',
                'type.integer' => 'Loại liên hệ không phù hợp.',
                'content.required' => 'Nội dung là bắt buộc.',
                'content.string' => 'Nội dung phải là chuỗi ký tự.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            Contact::create([
                'type' => $request->input('type'),
                'content' => $request->input('content'),
                'user_id' => Auth::id(),
            ]);

            return redirect()->route('web.contact.index')->with('success', 'Liên hệ của bạn đã được gửi.');
        }

        return view('web.customer.contact');
    }
}
