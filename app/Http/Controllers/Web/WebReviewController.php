<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class WebReviewController extends Controller
{
    public function create($id)
    {
        //Nếu chưa đánh giá thì tạo mới đánh giá với id của món ăn và id của người dùng đang đăng nhập
        $review = Review::where('food_id', $id)->where('user_id', Auth::id())->first();
        if($review == null){
            $review = new Review();
            $review->food_id = $id;
            $review->user_id = Auth::id();
            $review->rating = request()->rating;
            $review->content = request()->content == "" ? "Không có nội dung." : request()->content;
            $review->save();
        }else{
            //Nếu đã đánh giá thì cập nhật lại đánh giá
            $review->rating = request()->rating;
            $review->content = request()->content == "" ? "Không có nội dung." : request()->content;
            $review->save();
        }

        return redirect()->back()->with('success', 'Đánh giá món ăn thành công');
    }
}
