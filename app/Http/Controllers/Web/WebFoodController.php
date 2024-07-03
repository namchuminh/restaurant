<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

class WebFoodController extends Controller
{
    public function index(){
        $categories = Category::with('foods')->get();
        $foods = Food::all();
        return view('Web/Food/index', compact('categories', 'foods'));
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
            return view('Web/Food/view', compact('food', 'relatedFoods'));
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
