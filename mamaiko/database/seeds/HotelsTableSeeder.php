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
        for ($i = 1; $i <= 10; $i++) 
        {
            $hotel = new \App\Hotel([
                'name' => 'ホテル' . $i,
                'category_id' => rand(1, 6),
                'address' => '新宿区' . $i .'丁目',
                'access' => '新宿駅から西へ' . $i . '00歩',
                'description' => '星' . $i . '個のホテル',
                'checkin_time' => '21:00:00',
                'checkout_time' => '10:00:00',
                'file_name' => '',
            ]);
            $hotel->save();
        }
    }
}
