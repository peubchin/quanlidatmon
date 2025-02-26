<?php

namespace Database\Seeders;

use App\Models\FoodItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foodItems = [
            // Món nước (Noodle soups)
            [
                'name' => 'Lẩu thái',
                'image' => 'lau-thai.jpg',
            ],
            [
                'name' => 'Lẩu tomyum',
                'image' => 'lau-tomyum.jpg',
            ],

            // Món cơm (Rice dishes)
            [
                'name' => 'Cơm chiên nước mắm',
                'image' => 'com-chien-nuoc-mam.jpg',
            ],
            [
                'name' => 'Cơm chiên trân châu',
                'image' => 'com-chien-tran-chau.jpg',
            ],

            // Món xào (Stir-fried dishes)
            [
                'name' => 'Mì Xào Hải Sản',
                'image' => 'mi-xao-hai-san.jpg',
            ],
            [
                'name' => 'Rau Muống Xào Tỏi',
                'image' => 'rau-muong-xao-toi.jpg',
            ],

            // Hải sản (Seafood)
            [
                'name' => 'Ghẹ Hấp Bia',
                'image' => 'ghe-hap-bia.jpg',
            ],
            [
                'name' => 'Mực Nướng Muối Ớt',
                'image' => 'muc-nuong-muoi-ot.jpg',
            ],
        ];
        foreach ($foodItems as $idx => $item) {
            FoodItem::factory()->create([
                'name' => $item['name'],
                'image' => $item['image'],
                'food_type_id' => $idx,
            ]);
        }
    }
}
