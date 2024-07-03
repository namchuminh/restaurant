<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;

class WebCategoryController extends Controller
{
    public function view(Request $request, $slug)
    {
        try {
            $category = Category::where('slug', $slug)->firstOrFail();
            $category_id = $category->id;

            // Lấy giá trị sort từ request, mặc định là 'id_DESC'
            $sort = $request->input('sort', 'id_DESC');

            // Tạo mảng sắp xếp
            $sortOptions = [
                'price_ASC' => ['price', 'ASC'],
                'price_DESC' => ['price', 'DESC'],
                'id_ASC' => ['id', 'ASC'],
                'id_DESC' => ['id', 'DESC'],
            ];

            // Lấy cột và hướng sắp xếp từ mảng
            [$column, $direction] = $sortOptions[$sort] ?? ['id', 'DESC'];

            // Lấy dữ liệu với phân trang và sắp xếp
            $foods = Food::where('category_id', $category_id)
                            ->orderBy($column, $direction)
                            ->paginate(8); // Phân trang với 10 sản phẩm mỗi trang

            return view('Web/Category/view', compact('category', 'foods', 'sort'));
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
