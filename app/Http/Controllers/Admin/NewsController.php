<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        $totalPages = $news->lastPage(); // Lấy tổng số trang
        return view('Admin/News/index', compact('news', 'totalPages'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Admin/News/create', compact('categories'));
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
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'content.string' => 'Nội dung phải là chuỗi.',
            'image.image' => 'Hình ảnh phải là tệp hình ảnh.',
            'image.mimes' => 'Hình ảnh phải là một trong các loại: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Hình ảnh không được vượt quá 2048 kilobytes.',
            'slug.required' => 'Đường dẫn là bắt buộc.',
            'slug.string' => 'Đường dẫn phải là chuỗi.',
            'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',
            'slug.unique' => 'Đường dẫn đã được sử dụng.',
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists' => 'Danh mục không tồn tại.',
        ]);

        // Xử lý upload file image nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Tạo mới Category và lưu vào CSDL
        $news = News::create($validatedData);

        return redirect()->route('admin.news.index')->with('success', 'Thêm mới tin tức thành công!');
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
            $categories = Category::all();
            $news = News::findOrFail($id);
            return view('Admin/News/edit', compact('categories', 'news')); 
        } catch (\Exception $e) {
            return redirect()->route('admin.news.index')->with('error', 'Không tìm thấy chuyên mục!');
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
            'content' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|string|max:255|unique:news,slug,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'name.string' => 'Tiêu đề phải là chuỗi.',
            'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'content.string' => 'Nội dung phải là chuỗi.',
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists' => 'Danh mục không tồn tại.',
            'slug.required' => 'Đường dẫn là bắt buộc.',
            'slug.string' => 'Đường dẫn phải là chuỗi.',
            'slug.max' => 'Đường dẫn không được vượt quá 255 ký tự.',
            'slug.unique' => 'Đường dẫn đã được sử dụng.',
            'image.image' => 'Hình ảnh phải là tệp hình ảnh.',
            'image.mimes' => 'Hình ảnh phải là một trong các loại: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Hình ảnh không được vượt quá 2048 kilobytes.',
        ]);

        // Lấy đối tượng News từ CSDL
        $news = News::findOrFail($id);

        // Cập nhật thông tin của news
        $news->name = $validatedData['name'];
        $news->content = $validatedData['content'];
        $news->category_id = $validatedData['category_id'];
        $news->slug = $validatedData['slug'];

        // Xử lý upload file image nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
            $news->image = $imagePath;
        }

        // Lưu các thay đổi vào CSDL
        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Cập nhật tin tức thành công!');
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
            $news = News::findOrFail($id);

            // Xóa chuyên mục
            $news->delete();
    
            return redirect()->route('admin.news.index')->with('success', 'Xóa tin tức thành công!');
        } catch (\Exception $e) {
            return redirect()->route('admin.news.index')->with('error', 'Không tìm thấy tin tức!');
        }
    }
}
