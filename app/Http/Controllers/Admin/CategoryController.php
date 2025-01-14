<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        $totalPages = $categories->lastPage(); // Lấy tổng số trang
        return view('Admin/Category/index', compact('categories', 'totalPages'));
    }

    public function create()
    {
        return view('Admin/Category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ], [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'image.image' => 'Hình ảnh phải là tệp hình ảnh.',
            'image.mimes' => 'Hình ảnh phải là một trong các loại: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Hình ảnh không được vượt quá 2048 kilobytes.',
            'slug.required' => 'Đường dẫn là bắt buộc.',
            'slug.string' => 'Đường dẫn phải là chuỗi.',
            'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',
            'slug.unique' => 'Đường dẫn đã được sử dụng.',
        ]);

        // Xử lý upload file image nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Tạo mới Category
        $category = Category::create($validatedData);
        return redirect()->route('admin.category.index')->with('success', 'Thêm chuyên mục thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        try {
            // Lấy category từ CSDL dựa trên $id
            $category = Category::findOrFail($id);
    
            // Trả về view 'Admin/Category/edit' với dữ liệu category
            return view('Admin/Category/edit', compact('category'));
        } catch (\Exception $e) {
            // Nếu không tìm thấy category, có thể xử lý lỗi ở đây
            // Ví dụ: redirect về danh sách category với thông báo lỗi
            return redirect()->route('admin.category.index')->with('error', 'Không tìm thấy chuyên mục!');
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
        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
        ], [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'image.image' => 'Hình ảnh phải là tệp hình ảnh.',
            'image.mimes' => 'Hình ảnh phải là một trong các loại: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Hình ảnh không được vượt quá 2048 kilobytes.',
            'slug.required' => 'Đường dẫn là bắt buộc.',
            'slug.string' => 'Đường dẫn phải là chuỗi.',
            'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',
            'slug.unique' => 'Đường dẫn đã được sử dụng.',
        ]);

        // Lấy category cần cập nhật từ CSDL
        $category = Category::findOrFail($id);

        // Cập nhật thông tin của category
        $category->name = $validatedData['name'];
        
        // Xử lý upload file image nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        $category->slug = $validatedData['slug'];

        // Lưu thay đổi vào CSDL
        $category->save();

        // Chuyển hướng về trang danh sách category với thông báo thành công
        return redirect()->route('admin.category.index')->with('success', 'Cập nhật chuyên mục thành công!');
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
            $category = Category::findOrFail($id);

            // Xóa chuyên mục
            $category->delete();
    
            return redirect()->route('admin.category.index')->with('success', 'Xóa chuyên mục thành công!');
        } catch (\Exception $e) {
            return redirect()->route('admin.category.index')->with('error', 'Không tìm thấy chuyên mục!');
        }
    }
} 
