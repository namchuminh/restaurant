<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');

        $tables = Table::when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $totalPages = $tables->lastPage();

        return view('Admin/Table/index', compact('tables', 'totalPages', 'search'));
    }

    public function create()
    {
        return view('Admin/Table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // Thiết lập các thông báo lỗi tùy chỉnh
        $messages = [
            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên phải là chuỗi.',
            'address.required' => 'Địa chỉ không được để trống.',
            'address.string' => 'Địa chỉ phải là chuỗi.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
        ];

        // Thực hiện validation
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'quantity' => 'required|integer',
        ], $messages);

        // Nếu dữ liệu hợp lệ, lưu vào csdl
        $table = new Table(); // Thay Table bằng tên model của bạn
        $table->name = $validatedData['name'];
        $table->address = $validatedData['address'];
        $table->quantity = $validatedData['quantity'];
        $table->status = 0;
        $table->save();

        // Trả về phản hồi hoặc chuyển hướng người dùng
        return redirect()->route('admin.table.index')->with('success', 'Thêm mới bàn ăn mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        try{
            $table = Table::findOrFail($id);
            return view('Admin/Table/edit', compact('table')); 
        } catch (\Exception $e) {
            return redirect()->route('admin.table.index')->with('error', 'Không tìm thấy bàn ăn!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        // Thiết lập các thông báo lỗi tùy chỉnh
        $messages = [
            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên phải là chuỗi.',
            'address.required' => 'Địa chỉ không được để trống.',
            'address.string' => 'Địa chỉ phải là chuỗi.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
        ];

        // Thực hiện validation
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'quantity' => 'required|integer',
        ], $messages);

        // Tìm bản ghi theo ID và cập nhật dữ liệu
        $table = Table::findOrFail($id); // Thay Table bằng tên model của bạn
        $table->name = $validatedData['name'];
        $table->address = $validatedData['address'];
        $table->quantity = $validatedData['quantity'];
        $table->save();

        // Trả về phản hồi hoặc chuyển hướng người dùng
        return redirect()->route('admin.table.index')->with('success', 'Cập nhật bàn ăn thành công!');
    }

    public function status($id){
        // Tìm bản ghi theo ID và cập nhật dữ liệu
        $table = Table::findOrFail($id); // Thay Table bằng tên model của bạn
        $status = $table->status == 0 ? 1 : 0;
        $table->status = $status;
        $table->save();

        // Trả về phản hồi hoặc chuyển hướng người dùng
        return redirect()->route('admin.table.index')->with('success', 'Cập nhật trạng thái bàn ăn thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        try {
            // Lấy category từ CSDL dựa trên $id
            $news = Table::findOrFail($id);

            // Xóa bàn ăn
            $news->delete();
    
            return redirect()->route('admin.table.index')->with('success', 'Xóa tin bàn ăn thành công!');
        } catch (\Exception $e) {
            return redirect()->route('admin.table.index')->with('error', 'Không tìm thấy bàn ăn!');
        }
    }
}
