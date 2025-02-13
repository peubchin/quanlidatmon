<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   */
  public function run(): void {

    // Seed Departments
    DB::table('departments')->insert([
      ['name' => 'Kitchen'],
      ['name' => 'Service'],
      ['name' => 'Management'],
      ['name' => 'IT'],
      ['name' => 'HR'],
      ['name' => 'Finance'],
      ['name' => 'Marketing'],
      ['name' => 'Sales'],
      ['name' => 'Support'],
      ['name' => 'Operations']
    ]);

    // Seed Employees
    $employees = [
      ['John Doe', 'john@example.com', '1234567890', 1],
      ['Jane Smith', 'jane@example.com', '0987654321', 2],
      ['Michael Johnson', 'michael@example.com', '1122334455', 3],
      ['Emily Davis', 'emily@example.com', '2233445566', 4],
      ['David Brown', 'david@example.com', '3344556677', 5],
      ['Emma Wilson', 'emma@example.com', '4455667788', 6],
      ['Olivia Martin', 'olivia@example.com', '5566778899', 7],
      ['William Anderson', 'william@example.com', '6677889900', 8],
      ['Sophia Thomas', 'sophia@example.com', '7788990011', 9],
      ['James White', 'james@example.com', '8899001122', 10],
    ];
    foreach ($employees as $idx => $employee) {
      DB::table('employees')->insert([[
        'name' => $employee[0],
        'email' => $employee[1],
        'phone' => $employee[2],
        'department_id' => $employee[3],
      ]]);
    }

    // Seed Customers
    $customers = [
      ['Alice Johnson', 'alice@example.com', '5551112222'],
      ['Bob Williams', 'bob@example.com', '5553334444'],
      ['Charlie Brown', 'charlie@example.com', '5555556666'],
      ['Diana King', 'diana@example.com', '5557778888'],
      ['Ethan Lee', 'ethan@example.com', '5559990000'],
      ['Fiona Harris', 'fiona@example.com', '5551113333'],
      ['George Clark', 'george@example.com', '5554446666'],
      ['Hannah Lewis', 'hannah@example.com', '5557779999'],
      ['Isaac Young', 'isaac@example.com', '5552224444'],
      ['Jessica Scott', 'jessica@example.com', '5558880000'],
    ];
    foreach ($customers as $customer) {
      DB::table('customers')->insert([[
        'name' => $customer[0],
        'email' => $customer[1],
        'phone' => $customer[2]
      ]]);
    }

    // Seed Tables
    for ($i = 1; $i <= 10; $i++) {
      DB::table('tables')->insert([
        ['name' => 'Table ' . $i, 'seats' => rand(2, 6)],
      ]);
    }

    // Seed Food Types
    $foodTypes = ['Appetizer', 'Main Course', 'Dessert', 'Beverage', 'Salad', 'Soup', 'Seafood', 'Fast Food', 'Vegetarian', 'Pasta'];
    foreach ($foodTypes as $type) {
      DB::table('food_types')->insert([
        ['name' => $type]
      ]);
    }

    // Seed Food Items
    $foodItems = [
      ['Burger', 8.99, 'Juicy beef patty with lettuce, tomato, and cheese', 8],
      ['Pizza', 12.99, 'Wood-fired Margherita pizza with fresh basil', 8],
      ['Caesar Salad', 7.99, 'Classic Caesar salad with croutons and parmesan', 5],
      ['Lobster Bisque', 14.99, 'Rich and creamy lobster soup', 6],
      ['Spaghetti Carbonara', 11.99, 'Traditional Italian pasta with pancetta and egg sauce', 10],
      ['Chocolate Cake', 6.99, 'Decadent chocolate cake with ganache', 3],
      ['Sushi Platter', 18.99, 'Assorted fresh sushi with soy sauce', 7],
      ['French Fries', 4.99, 'Crispy golden fries with ketchup', 8],
      ['Grilled Salmon', 15.99, 'Grilled salmon with lemon butter sauce', 7],
      ['Lemonade', 3.99, 'Freshly squeezed lemonade', 4]
    ];
    foreach ($foodItems as $item) {
      DB::table('food_items')->insert([
        ['name' => $item[0], 'price' => $item[1], 'description' => $item[2], 'food_type_id' => $item[3]]
      ]);
    }

    // Seed Orders
    for ($i = 1; $i <= 10; $i++) {
      DB::table('orders')->insert([
        ['customer_id' => rand(1, 10), 'table_id' => rand(1, 10), 'employee_id' => rand(1, 10), 'paid' => (bool) rand(0, 1), 'discount' => rand(0, 20)],
      ]);
    }

    // Seed Order Details
    for ($i = 1; $i <= 10; $i++) {
      DB::table('order_details')->insert([
        ['order_id' => rand(1, 10), 'food_item_id' => rand(1, 10), 'quantity' => rand(1, 5), 'price' => rand(5, 50), 'status' => 'cooking'],
      ]);
    }
  }
}
