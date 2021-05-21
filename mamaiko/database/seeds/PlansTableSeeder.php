<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i =1;$i<=10;$i++){
            $plan = new \App\Plan([
                'name' => 'サンプルプランA-'.$i,
                'description' => 'サンプルです。低めです。',
                'price' => rand(1,5) * 3000,
                'room_count' => rand(1,3),
                'hotel_id' => $i
            ]);
            $plan->save();
            
            $plan2 = new \App\Plan([
                'name' => 'サンプルプランB-'.$i,
                'description' => 'サンプルBです。高めです。',
                'price' => rand(5,10) * 3000,
                'room_count' => rand(1,3),
                'hotel_id' => $i
            ]);
            $plan2->save();
        }
    }
}
