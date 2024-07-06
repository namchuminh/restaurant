<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;


class WebWishListController extends Controller
{
    public function index(){
        $wishlists = Wishlist::with('food')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('web.wishlist.index', compact('wishlists'));
    }

    public function add($id){
        try{
            $food = Food::findOrFail($id);
            $wishlist = Wishlist::where('user_id', Auth::id())->where('food_id', $food->id)->first();
            if (!$wishlist) {
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'food_id' => $food->id,
                ]);
    
                return redirect()->back()->with('success', 'Thêm vào danh sách yêu thích thành công.');
            }
            return redirect()->back()->with('info', 'Món ăn này đã có trong danh sách yêu thích.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Không tìm thấy món ăn!');
        }
    }

    public function delete($id){
        try{
            $food = Food::findOrFail($id);
            $wishlist = Wishlist::where('user_id', Auth::id())->where('food_id', $food->id)->first();
            if ($wishlist) {
                $wishlist->delete();
                return redirect()->back()->with('success', 'Xóa món ăn khỏi danh sách yêu thích thành công.');
            }
            return redirect()->back()->with('info', 'Món ăn này chưa có trong danh sách yêu thích.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Không tìm thấy món ăn!');
        }
    }
}
