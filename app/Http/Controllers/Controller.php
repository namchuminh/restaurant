<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use App\Models\Config;
use App\Models\Wishlist;
use View;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth.custom')->except(['login', 'register']);
        
        $listMenuCategory = Category::all();
        View::share('listMenuCategory', $listMenuCategory);

        $config = Config::get()->first();
        View::share('config', $config); 
    }
}
