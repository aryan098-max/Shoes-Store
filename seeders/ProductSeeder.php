<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
            'name'=> 'University Blue Jordan1',
            'price'=> '11000',
            'description'=> "Mens Shoes",
            'category'=>"shoes",
            'gallery'=>"https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/eaa42dac-16bb-4174-accd-2bbd06cee899/air-jordan-1-university-blue-release-date.jpg"
              
            ],

            [
                'name'=> 'Jordan Max Aura 3',
                'price'=> '8000',
                'description'=> "Jordan Collab with Nike",
                'category'=>'Mens shoes',
                'gallery'=>"https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/79b9ba92-3110-43c4-b09a-26186b5a986c/jordan-max-aura-3-shoe-HtHRtP.png"
                
            ],

            [
                'name'=> 'Air Jordan Low ',
                'price'=> '7500',
                'description'=> "Jordan Collab with Nike",
                'category'=>'Women shoes',
                'gallery'=>"https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9122275a-a023-42d9-aa5a-f8b6676c4b5e/air-jordan-1-low-shoe-459b4T.png"
               
            ],
            
            [
                'name'=> 'Air Jordan low',
                'price'=> '10000',
                'description'=> "Jordan Collab with Nike",
                'category'=>'Mens shoes',
                'gallery'=>"https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/f0f7064e-51ab-4350-ac80-efcdb64ac786/air-jordan-1-low-shoes-ZdMg83.png"
            ],


            [
                'name'=> 'Air Jordan 1 RetroHig',
                'price'=> '12000',
                'description'=> "Jordan Collab with Nike",
                'category'=>'Mens shoes',
                'gallery'=>"https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/0a685517-4392-4fb0-a596-a2eee41f0e12/air-jordan-1-retro-high-og-shoes-a7Zzxm.png"
                
            ],
            
        ]);

    }
}
