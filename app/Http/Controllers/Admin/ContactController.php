<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{   
    public function index(Request $request)
    {
        $search = $request->input('search');

        $contacts = Contact::with('user')
            ->when($search, function ($query, $search) {
                return $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $totalPages = $contacts->lastPage();

        return view('Admin/Contact/index', compact('contacts', 'totalPages', 'search'));
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
