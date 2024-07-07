<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('table')->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $totalPages = $orders->lastPage(); // Lấy tổng số trang
        return view('admin.order.index', compact('orders', 'totalPages'));
    }

    public function view($code){
        try{
            $order = Order::with('table')->with('user')->where('code', $code)->firstOrFail();
            return view('admin.order.view', compact('order')); 
        } catch (\Exception $e) {
            return redirect()->route('admin.order.index')->with('error', 'Không tìm thấy hóa đơn!');
        }
    }

    public function payment($code){

    }
}
