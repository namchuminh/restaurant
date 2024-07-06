<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\Table;
use Carbon\Carbon;


class WebOrderController extends Controller
{
    public function index(){
        $tables = Table::orderBy('id', 'DESC')->get();
        return view('web.order.index', compact('tables'));
    }

    public function order(Request $request){
        $validator = Validator::make($request->all(), [
            'people' => 'required|integer|min:1',
            'date' => 'required|date_format:d-m-y',
            'time' => 'required|date_format:H:i',
            'table_id' => 'required|exists:tables,id'
        ], [
            'people.required' => 'Số người là bắt buộc.',
            'people.integer' => 'Số người phải là số nguyên.',
            'people.min' => 'Số người phải ít nhất là 1.',
            'date.required' => 'Ngày là bắt buộc.',
            'date.date_format' => 'Định dạng ngày không hợp lệ.',
            'time.required' => 'Giờ là bắt buộc.',
            'time.date_format' => 'Định dạng giờ không hợp lệ.',
            'table_id.required' => 'Bàn là bắt buộc.',
            'table_id.exists' => 'Bàn không tồn tại.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dateTime = Carbon::createFromFormat('d-m-y H:i', $request->input('date') . ' ' . $request->input('time'))->format('Y-m-d H:i:s');

        // Kiểm tra xem bàn đã được đặt trong thời gian đó chưa
        $existingOrder = Order::where('table_id', $request->input('table_id'))
            ->where('time_order', $dateTime)
            ->exists();

        if ($existingOrder) {
            return redirect()->back()->withErrors(['table_id' => 'Bàn đã được đặt trong thời gian này.'])->withInput();
        }

        Order::create([
            'code' => Order::generateRandomCode(),
            'people' => $request->input('people'),
            'user_id' => Auth::id(),
            'table_id' => $request->input('table_id'),
            'time_order' => $dateTime,
        ]);

        return redirect()->back()->with('success', 'Đặt bàn thành công!');
    }
}
