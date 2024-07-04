<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class WebNewsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        if ($keyword) {
            // Tìm kiếm các bài viết chứa từ khóa trong tên hoặc nội dung
            $news = News::with('category')
                        ->where('name', 'LIKE', "%{$keyword}%")
                        ->orWhere('content', 'LIKE', "%{$keyword}%")
                        ->paginate(5);

            if ($news->isEmpty()) {
                // Nếu không tìm thấy kết quả, quay lại trang index với thông báo
                return redirect()->route('web.news.list')
                                 ->with('status', 'Không tìm thấy tin tức: ' . $keyword)
                                 ->with('keyword', $keyword);
            }
        } else {
            // Lấy tất cả bài viết với phân trang
            $news = News::with('category')->paginate(5);
        }

        // Lấy danh sách category cùng với số lượng bài viết
        $categories = Category::withCount('news')->get();
        $recentPosts = News::latest()->limit(5)->get();
        return view('web.news.index', compact('news', 'categories', 'keyword', 'recentPosts'));
    }

    public function view($slug){
        try {
            $newsItem = News::with('category')->where('slug', $slug)->firstOrFail();
            $categories = Category::withCount('news')->get();
            $recentPosts = News::latest()->limit(5)->get();
            return view('web.news.view', compact('newsItem', 'categories', 'recentPosts'));
        } catch (\Exception $e) {
            return redirect()->route('admin.news.list')->with('status', 'Không timg thấy tin tức.');
        }
    }

    public function show($slug){
        try {
            $category = Category::where('slug', $slug)->firstOrFail();
            $category_id = $category->id;

            $news = News::with('category')->where('category_id', $category_id)->paginate(5);

            if($news->total() <= 0){
                return redirect()->route('admin.news.list')->with('status', 'Không timg thấy tin tức.');
            }

            $categories = Category::withCount('news')->get();
            $recentPosts = News::latest()->limit(5)->get();
            return view('web.news.index', compact('news', 'categories', 'recentPosts'));
        } catch (\Exception $e) {
            return redirect()->route('web.news.list')->with('status', 'Không timg thấy chuyên mục tin tức.');
        }
    }
}
