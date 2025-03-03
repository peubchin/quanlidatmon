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
        $foodTypes = [
            // Món nước (Noodle soups)
            1 => [
                [
                    'name' => 'Lẩu thái',
                    'image' => 'lau-thai.jpg',
                ],
                [
                    'name' => 'Lẩu tomyum',
                    'image' => 'lau-tomyum.jpg',
                ],
            ],
        
            // Món cơm (Rice dishes)
            2 => [
                [
                    'name' => 'Cơm chiên nước mắm',
                    'image' => 'com-chien-nuoc-mam.jpg',
                ],
                [
                    'name' => 'Cơm chiên dương châu',
                    'image' => 'com-chien-tran-chau.jpg',
                ],
            ],
        
            // Hải sản (Seafood)
            3 => [
                [
                    'name' => 'Ghẹ hấp bia',
                    'image' => 'ghe-hap-bia.jpg',
                ],
                [
                    'name' => 'Mực nướng muối ớt',
                    'image' => 'muc-nuong-muoi-ot.jpg',
                ],
                [
                    'name' => 'Tôm sú nướng',
                    'image' => 'tom-su-nuong.jpg',
                ],
                [
                    'name' => 'Ốc hương rang muối',
                    'image' => 'oc-huong-rang-muoi.jpg',
                ],
            ],
        
            // Món nướng (Grilled dishes)
            4 => [
                [
                    'name' => 'Ba chỉ nướng sa tế',
                    'image' => 'ba-chi-nuong-sa-te.jpg',
                ],
                [
                    'name' => 'Bò nướng lá lốt',
                    'image' => 'bo-nuong-la-lot.jpg',
                ],
            ],
        
            // Món hấp (Steamed dishes)
            5 => [
                [
                    'name' => 'Ngao hấp sả',
                    'image' => 'ngao-hap-sa.jpg',
                ],
                [
                    'name' => 'Bạch tuộc hấp gừng',
                    'image' => 'bach-tuoc-hap-gung.jpg',
                ],
            ],
        
            // Món xào (Stir-fried dishes)
            6 => [
                [
                    'name' => 'Mì xào hải sản',
                    'image' => 'mi-xao-hai-san.jpg',
                ],
                [
                    'name' => 'Rau muống xào tỏi',
                    'image' => 'rau-muong-xao-toi.jpg',
                ],
            ],
        
            // Món nhậu (Drinking Snacks)
            7 => [
                [
                    'name' => 'Đậu hũ chiên giòn',
                    'image' => 'dau-hu-chien-gion.jpg',
                ],
                [
                    'name' => 'Khô mực nướng',
                    'image' => 'kho-muc-nuong.jpg',
                ],
                [
                    'name' => 'Bò khô lá chanh',
                    'image' => 'bo-kho-la-chanh.jpg',
                ],
                [
                    'name' => 'Gà hấp hành',
                    'image' => 'ga-hap-hanh.jpg',
                ],
            ],
        
            // Đồ uống (Drinks - Quán nhậu style)
            8 => [
                [
                    'name' => 'Bia Tiger',
                    'image' => 'bia-tiger.webp',
                ],
                [
                    'name' => 'Bia Heineken',
                    'image' => 'heineken.webp',
                ],
                [
                    'name' => 'Rượu nếp than',
                    'image' => 'ruou-nep-than.jpeg',
                ],
                [
                    'name' => 'Rượu chuối hột',
                    'image' => 'ruou-chuoi-hot.jpg',
                ],
                [
                    'name' => 'Nước ngọt Coca-Cola',
                    'image' => 'coca-cola.jpg',
                ],
                [
                    'name' => 'Trà đá',
                    'image' => 'tra-da.jpg',
                ],
            ],
        ];
        
        foreach ($foodTypes as $idx => $foodItems) {
            foreach ($foodItems as $item) {
                FoodItem::factory()->create([
                    'name' => $item['name'],
                    'image' => $item['image'],
                    'food_type_id' => $idx,
                ]);
            }
        }
    }
}
