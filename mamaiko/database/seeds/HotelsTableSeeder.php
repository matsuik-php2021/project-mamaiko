<?php

use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotels = \App\Hotel::all();
        $names = [
            "photos/AUOs3GsKAZ7XNZZuRkNFP0As7z4zXTj6fYax2b39.jpg",
            "photos/pjKl5UVGM8BavMXCIB5RSV2C017lsaUHfgvFU1Rk.jpg",
            "photos/j27Drec1iJpHbLZoAiIyL8ObBVhu0GStArwwtN5F.jpg",
            "photos/KsV91CO4ep7eYsK1MgwbHRXPwEuqAH6yIYhTDUa3.jpg",
            "photos/Jxut9P5ATVGXXody5paO5GcBMbAWUT7fImJT9sqs.jpg",
            "photos/RV8mtU8umALQda5h5VIQSwGSPFEwl2YrZgCWS2eO.jpg",
            "photos/0ZtFr6FMUr6IVetmoLaIX7GFMg9bPEp4SGvssAqy.jpg",
            "photos/wJkgZ80Q1Cc2vC1mdKsovdb0avxTHvjEUvpArk5c.jpg",
            "photos/H5SYiydHu16LfpksIwWp6ZG2XxmmdP3k0DXgbVX9.png",
            "photos/wtQ4gUpLEaBF31Ic6k2DSY3ZaLOH7BKI6C7L8q7q.jpg ",
        ];
        for ($i = 0; $i < 10; $i++) 
        {
            $hotels[$i]->file_name =$names[$i];
            $hotels[$i]->save();
        }
        // for ($i = 1; $i <= 10; $i++) 
        // {
        //     $hotel = new \App\Hotel([
        //         'name' => 'ホテル' . $i,
        //         'category_id' => rand(1, 6),
        //         'address' => '新宿区' . $i .'丁目',
        //         'access' => '新宿駅から西へ' . $i . '00歩',
        //         'description' => '星' . $i . '個のホテル',
        //         'checkin_time' => '21:00:00',
        //         'checkout_time' => '10:00:00',
        //     ]);
        //     $hotel->save();
        // }
    }
}
