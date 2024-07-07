<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\DetailOrder;

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
            $detailOrders = DetailOrder::with('food')->where('order_id', $order->id)->get();
            return view('admin.order.view', compact('order', 'detailOrders')); 
        } catch (\Exception $e) {
            return redirect()->route('admin.order.index')->with('error', 'Không tìm thấy hóa đơn!');
        }
    }

    public function payment($code){
        try{
            $order = Order::with('table')->with('user')->where('code', $code)->firstOrFail();
            if($order->amount == 0){
                $order->status = 0;
                $order->save();
                return redirect()->back()->with('success', 'Hủy đặt bàn công cho hóa đơn!');
            }else{
                $order->payment = 1;
                $order->status = 2;
                $order->save();
                return redirect()->back()->with('success', 'Thanh toán thành công cho hóa đơn!');
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.order.index')->with('error', 'Không tìm thấy hóa đơn!');
        }
    }

    public function addFood($code){
        try{
            $order = Order::with('table')->with('user')->where('code', $code)->firstOrFail();
            $foods = Food::orderBy('id', 'DESC')->get();
            return view('admin.order.addfood', compact('order', 'foods'));
        }catch(\Exception $e){
            return redirect()->route('admin.order.index')->with('error', 'Không tìm thấy hóa đơn!');
        }
    }

    public function addFoodDetail(Request $request, $code){
        $order = Order::with('table')->with('user')->where('code', $code)->firstOrFail();
            
        // Validate dữ liệu đầu vào
        $request->validate([
            'food_id' => 'required|exists:food,id',
            'quantity' => 'required|integer|min:1'
        ], [
            'food_id.required' => 'Vui lòng chọn món ăn.',
            'food_id.exists' => 'Món ăn không tồn tại.',
            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 1.'
        ]);

        // Kiểm tra nếu món ăn đã tồn tại trong hóa đơn
        $detailOrder = DetailOrder::where('order_id', $order->id)
            ->where('food_id', $request->input('food_id'))
            ->first();

        if ($detailOrder) {
            // Cập nhật số lượng nếu món ăn đã tồn tại trong hóa đơn
            $detailOrder->quantity += $request->input('quantity');
            $detailOrder->save();
        } else {
            // Tạo mới nếu món ăn chưa tồn tại trong hóa đơn
            DetailOrder::create([
                'order_id' => $order->id,
                'food_id' => $request->input('food_id'),
                'quantity' => $request->input('quantity')
            ]);
        }

        //Cập nhật lại amount cho order
        $detailOrders = DetailOrder::with('food')->where('order_id', $order->id)->get();
        $amount = 0;
        foreach($detailOrders as $key => $detailOrder){
            $amount += $detailOrder->food->price * $detailOrder->quantity;
        }

        $order->amount = $amount;
        $order->save();

        // Chuyển hướng với thông báo thành công
        return redirect()->back()->with('success', 'Thêm món ăn vào hóa đơn thành công.');
    }
}
