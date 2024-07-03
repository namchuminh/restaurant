<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::with(['foods' => function($query) {
            $query->limit(8);
        }])->get();
        $foods = Food::limit(8)->get();
        $news = News::with('category')->orderBy('id', 'desc')->limit(6)->get();
        return view('Web/home', compact('categories', 'foods', 'news'));
    }
}
