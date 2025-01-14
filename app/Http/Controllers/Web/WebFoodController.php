<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Models\Table;
use App\Models\Review;

class WebFoodController extends Controller
{
    public function index(){
        $categories = Category::with('foods')->get();
        $foods = Food::all();
        $tables = Table::orderBy('id', 'DESC')->get();
        return view('Web/Food/index', compact('categories', 'foods', 'tables'));
    }

    public function view($slug){
        try {
            $food = Food::with('category')->where('slug', $slug)->firstOrFail();
            $category_id = $food->id;
            $relatedFoods = Food::where('category_id', $category_id)
                             ->where('id', '!=', $food->id)
                             ->inRandomOrder()
                             ->limit(8)
                             ->get();
            
            //Lấy ra 4 đánh giá mới nhất của món ăn theo food->id thông qua model Review
            $reviews = Review::with('user')->where('food_id', $food->id)->orderBy('id', 'DESC')->limit(4)->get();

            //Lấy ra số sao của món ăn hiện tại theo food->id thông qua model Review
            $rating = Review::where('food_id', $food->id)->avg('rating');

            return view('Web/Food/view', compact('food', 'relatedFoods', 'reviews', 'rating'));
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
