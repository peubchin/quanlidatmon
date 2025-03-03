<?php

namespace App\Http\Controllers;

use App\Models\FoodType;
use Illuminate\Http\Request;
use App\Models\FoodItem;


class HomeController extends Controller {
    public function index() {
        $foodItems = FoodItem::all();

        $slogans = [
            [
                'image' => 'img/spaces/space2.jpg',
                'slogan' => 'Món ngon tinh tế <br> Chuẩn vị, chuẩn gu!'
            ],
            [
                'image' => 'img/spaces/space3.jpg',
                'slogan' => 'Dịch vụ tận tâm <br> Khách hàng là ưu tiên số 1!'
            ],
            [
                'image' => 'img/spaces/space4.jpg',
                'slogan' => 'Đặt bàn ngay <br> Đừng bỏ lỡ những hương vị tuyệt hảo!'
            ],
            [
                'image' => 'img/spaces/space5.jpg',
                'slogan' => 'Tiệc tùng, hẹn hò hay họp mặt? <br> Chúng mình đều có chỗ lý tưởng cho bạn!'
            ],
        ];
        return view('home', compact('foodItems', 'slogans')); // Truyền biến $slides vào view
    }

    public function menu(Request $request) {

        // Lấy danh sách loại món ăn
        $foodTypes = FoodType::all();

        // Kiểm tra nếu có filter theo loại món ăn
        $query = FoodItem::query();

        if ($request->has('food_type') && strlen($request->food_type) > 0) {
            $query->where('food_type_id', $request->food_type);
        }

        // Sắp xếp theo giá trước
        $sort = $request->input('sort', 'price_asc'); // Mặc định là giá tăng dần
        if ($sort == 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('price', 'asc'); // Mặc định
        }

        $foodItems = $query->with('foodType')->get();


        // Trả về view với danh sách món ăn
        return view('guests.list-mon', compact('foodItems', 'foodTypes'));
    }
}
