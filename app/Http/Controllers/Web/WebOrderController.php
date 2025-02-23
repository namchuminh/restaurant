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

    public function getFilterTable(){
        $tables = Table::orderBy('id', 'DESC')->get();
        return view('web.order.index', compact('tables'));
    }

    public function filterTable(){
        //Lọc ra các bàn có thể đặt theo điện kiện post date và post time ghép lại không có tỏng bảng order theo cột time_order, điều kiện post people <= quantity bảng table
        $tablesFilter = Table::whereDoesntHave('orders', function ($query) {
            $query->where('time_order', Carbon::createFromFormat('d-m-y H:i', request()->date . ' ' . request()->time)->format('Y-m-d H:i:s'));
        })->where('quantity', '>=', request()->people)->get();
        $tables = Table::orderBy('id', 'DESC')->get();
        return view('web.order.index', compact('tablesFilter', 'tables'));
    }

    public function order(Request $request){
        $validator = Validator::make($request->all(), [
            'people' => 'required|integer|min:1',
            'date' => [
                'required',
                'date_format:d-m-y', // Giữ nguyên định dạng d-m-y như đầu vào
                function ($attribute, $value, $fail) {
                    $date = \DateTime::createFromFormat('d-m-y', $value);
                    if (!$date) {
                        return $fail('Ngày không hợp lệ.');
                    }
        
                    $today = new \DateTime();
                    $today->setTime(0, 0, 0); // Đưa về 00:00:00 để so sánh chính xác
        
                    if ($date < $today) {
                        return $fail('Ngày đặt bàn phải lớn hơn hoặc bằng ngày hiện tại.');
                    }
                }
            ],
            'time' => 'required|date_format:H:i',
            'table_id' => 'required|exists:tables,id'
        ], [
            'people.required' => 'Số người là bắt buộc.',
            'people.integer' => 'Số người phải là số nguyên.',
            'people.min' => 'Số người phải ít nhất là 1.',
            'date.required' => 'Ngày là bắt buộc.',
            'date.date_format' => 'Định dạng ngày không hợp lệ. Định dạng đúng là dd-mm-yy.',
            'time.required' => 'Giờ là bắt buộc.',
            'time.date_format' => 'Định dạng giờ không hợp lệ. Định dạng đúng là HH:ii.',
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

    public function cancel($id){
        //Lấy theo id và chuyển status order thành 0
        $order = Order::find($id);
        $order->status = 0;
        $order->save();
        return redirect()->back()->with('success', 'Hủy đặt bàn thành công!');
    }

    public function update($id){
        //Lấy post tableId gán vào biến tableId
        $tableId = request()->tableId;

        //Lấy theo id của orders
        $order = Order::find($id);

        if($tableId == $order->table_id){
            return redirect()->back()->with('success', 'Cập nhật đặt bàn thành công!');
        }

        // Kiểm tra xem bàn đã được đặt trong thời gian đó chưa
        $existingOrder = Order::where('table_id', request()->tableId)
            ->where('time_order', $order->time_order)
            ->exists();

        if ($existingOrder) {
            return redirect()->back()->with('success', 'Bàn đã được khách hàng đặt trước đó!');
        }

        //Cập nhật lại table_id của order
        $order->table_id = $tableId;
        $order->save();
        
        return redirect()->back()->with('success', 'Cập nhật đặt bàn thành công!');
    }
}
