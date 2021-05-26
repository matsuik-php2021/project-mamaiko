<?php

namespace App\Http\Controllers;

use App\review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($id) {
        $review = Review::query()->where("hotel_id","=",$id);
        return view('review.index',["review"=>$review]);

    }
    public function review(Request $request) {

        $result = false;

        // バリデーション
        $request->validate([
            'hotel_id' => [
                'required',
                'exists:user_id,rate',
                function($attribute, $value, $fail) use($request) {

                    // ログインしてるかチェック
                    if(!auth()->check()) {

                        $fail('レビューするにはログインしてください。');
                        return;

                    }

                    // すでにレビュー投稿してるかチェック
                    $exists = \App\Review::where('user_id', $request->user()->id)
                        ->where('hotel_id', $request->hotel_id)
                        ->exists();

                    if($exists) {

                        $fail('すでにレビューは投稿済みです。');
                        return;

                    }

                }
            ],
            'rate' => 'required|tinyint|min:1|max:5'
        ]);

        $review = new \App\Review();
        $review->hotel_id = $request->hotel_id;
        $review->user_id = $request->user()->id;
        $review->rate = $request->rate;
        $review->review = $request->review;
        $result = $review->save();
        return ['result' => $result];

    }
}
