<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Food;
use App\Models\Category;

class FoodController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');

        $foods = Food::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $totalPages = $foods->lastPage();

        return view('Admin/Food/index', compact('foods', 'totalPages', 'search'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Admin/Food/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'sale' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'slug' => 'required|string|max:255|unique:food,slug',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Tên món ăn là bắt buộc.',
            'name.string' => 'Tên món ăn phải là chuỗi.',
            'name.max' => 'Tên món ăn không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
            'sale.required' => 'Giá gốc là bắt buộc.',
            'sale.numeric' => 'Giá gốc phải là số.',
            'sale.min' => 'Giá gốc phải lớn hơn hoặc bằng 0.',
            'price.required' => 'Giá bán là bắt buộc.',
            'price.numeric' => 'Giá bán phải là số.',
            'price.min' => 'Giá bán phải lớn hơn hoặc bằng 0.',
            'slug.required' => 'Đường dẫn là bắt buộc.',
            'slug.string' => 'Đường dẫn phải là chuỗi.',
            'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',
            'slug.unique' => 'Đường dẫn đã được sử dụng.',
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists' => 'Danh mục không tồn tại.',
            'image.image' => 'Hình ảnh phải là tệp hình ảnh.',
            'image.mimes' => 'Hình ảnh phải là một trong các loại: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Hình ảnh không được vượt quá 2048 kilobytes.',
        ]);

        // Xử lý upload file image nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('foods', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Tạo mới một bản ghi trong bảng foods
        Food::create($validatedData);

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('admin.food.index')->with('success', 'Thêm món ăn mới thành công!');   
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
            $food = Food::findOrFail($id);
            $categories = Category::all();
            return view('Admin/Food/edit', compact('categories', 'food')); 
        } catch (\Exception $e) {
            return redirect()->route('admin.food.index')->with('error', 'Không tìm thấy món ăn!');
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
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'sale' => 'required|numeric|min:0', // Giá gốc
            'price' => 'required|numeric|min:0', // Giá bán
            'slug' => 'required|string|max:255|unique:food,slug,' . $id, // Chú ý sửa tên bảng ở đây
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Tên món ăn là bắt buộc.',
            'name.string' => 'Tên món ăn phải là chuỗi.',
            'name.max' => 'Tên món ăn không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'sale.required' => 'Giá gốc là bắt buộc.',
            'sale.numeric' => 'Giá gốc phải là số.',
            'sale.min' => 'Giá gốc phải lớn hơn hoặc bằng 0.',
            'price.required' => 'Giá bán là bắt buộc.',
            'price.numeric' => 'Giá bán phải là số.',
            'price.min' => 'Giá bán phải lớn hơn hoặc bằng 0.',
            'slug.required' => 'Đường dẫn là bắt buộc.',
            'slug.string' => 'Đường dẫn phải là chuỗi.',
            'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',
            'slug.unique' => 'Đường dẫn đã được sử dụng.',
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists' => 'Danh mục không tồn tại.',
            'image.image' => 'Hình ảnh phải là tệp hình ảnh.',
            'image.mimes' => 'Hình ảnh phải là một trong các loại: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Hình ảnh không được vượt quá 2048 kilobytes.',
        ]);

        try {
            // Tìm kiếm bản ghi Food với ID
            $food = Food::findOrFail($id);
    
            // Xử lý upload file image nếu có
            if ($request->hasFile('image')) {
                // Xóa ảnh cũ nếu có
                if ($food->image && Storage::disk('public')->exists($food->image)) {
                    Storage::disk('public')->delete($food->image);
                }
    
                $imagePath = $request->file('image')->store('food', 'public');
                $validatedData['image'] = $imagePath;
            }
    
            // Cập nhật bản ghi với dữ liệu mới
            $food->update($validatedData);
    
            // Chuyển hướng về trang danh sách với thông báo thành công
            return redirect()->route('admin.food.index')->with('success', 'Cập nhật món ăn thành công!');
        } catch (\Exception $e) {
            // Xử lý lỗi và chuyển hướng về trang danh sách với thông báo lỗi
            return redirect()->route('admin.food.index')->with('error', 'Có lỗi xảy ra khi cập nhật món ăn.');
        }
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
            $food = Food::findOrFail($id);
            // Xóa chuyên mục
            $food->delete();
            return redirect()->route('admin.food.index')->with('success', 'Xóa món ăn thành công!');
        } catch (\Exception $e) {
            return redirect()->route('admin.food.index')->with('error', 'Không tìm thấy món ăn!');
        }
    }
}
