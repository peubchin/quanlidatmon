<?php

namespace Database\Seeders;

use App\Models\FoodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foodTypes = [
            'Món nước',    // Noodle soups (e.g., Phở, Bún Bò Huế)
            'Món cơm',     // Rice dishes (e.g., Cơm Tấm, Cơm Gà)
            'Món chay',    // Vegetarian dishes
            'Hải sản',     // Seafood
            'Món nướng',   // Grilled dishes (e.g., Bún Chả, Thịt Nướng)
            'Món hấp',     // Steamed dishes
            'Món xào',     // Stir-fried dishes
            'Món gỏi',     // Salads (e.g., Gỏi Gà, Gỏi Ngó Sen)
            'Bánh & ăn vặt', // Snacks & cakes (e.g., Bánh Mì, Bánh Xèo)
            'Đồ uống'       // Drinks (e.g., Trà Sữa, Nước Mía)
        ];
        foreach ($foodTypes as $idx => $item) {
            FoodType::factory()->create([
                'name' => $item,
            ]);
        }
    }
}
