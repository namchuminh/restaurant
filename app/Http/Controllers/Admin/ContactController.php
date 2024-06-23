<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{   
    public function index(){
        $contacts = Contact::with('user')->orderBy('created_at', 'desc')->paginate(10);
        $totalPages = $contacts->lastPage(); // Lấy tổng số trang
        return view('Admin/Contact/index', compact('contacts', 'totalPages'));
    }

    public function view($id){
        try{
            $contact = Contact::with('user')->where('id', $id)->firstOrFail();
            return view('Admin/Contact/view', compact('contact'));
        } catch (\Exception $e) {
            return redirect()->route('admin.contact.index')->with('error', 'Không tìm thấy liên hệ!');
        }
    }
}
