<?php

use Illuminate\Database\Seeder;


class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 25 ; $i++) { // 👈 追加

            $review = new \App\Review();
            $review->rate  = $i % 4+1;
            $review->review = '匿名レビュー'. $i;
            $review->hotel_id=rand(1,9);
            $review->user_id=1;
            $review->save();
        }
    }
}