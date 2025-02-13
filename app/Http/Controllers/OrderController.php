<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller {
    public function index() {
        $orders = Order::get();
        return view('order.index')->with('orders', $orders);
    }

    public function create() {
        $employees = Employee::get();
        $customers = Customer::get();
        $tables = Table::get();
        return view('order.create')->with('customers', $customers)->with('tables', $tables)->with('employees', $employees);
    }

    public function store(Request $request) {
        // Validation cho 'ten-phong-ban'
        $validatedData = $request->validate([
            'tableId' => 'required',
        ], [
            'tableId.required' => 'Bàn là bắt buộc.',
        ]);

        // Sử dụng model để thêm dữ liệu
        Order::create([
            'employee_id' => $request->input('employeeId'),
            'customer_id' => $request->input('customerId'),
            'table_id' => $validatedData['tableId'],
        ]);

        return redirect()->route('order.index')->with('success', 'Thêm đơn hàng thành công.');
    }
     // Hiển thị form chỉnh sửa đơn hàng
     public function edit($id)
     {
         $order = Order::findOrFail($id);
         $customers = Customer::all();
         $employees = Employee::all();
         $tables = Table::get();
         return view('order.edit', compact('order', 'customers', 'employees', 'tables'));
     }

     // Cập nhật thông tin đơn hàng
     public function update(Request $request, $id)
     {
         $request->validate([
             'customer_id' => 'required|exists:customers,id',
             'employee_id' => 'required|exists:employees,id',
             'table_id' => 'required|string|max:255',
         ]);

         $order = Order::findOrFail($id);
         $order->update($request->all());

         return redirect()->route('order.index')->with('success', 'Đơn hàng đã được cập nhật thành công!');
     }

     // Xóa đơn hàng
     public function destroy($id)
     {
         $order = Order::findOrFail($id);
         $order->delete();

         return redirect()->route('order.index')->with('success', 'Đơn hàng đã được xóa!');
     }
 }

