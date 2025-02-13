<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller {
  public function index() {
    $customers = Customer::all();
    return view('customer.index', compact('customers'));
  }

  public function create() {
    return view('customer.form', [
      'mode' => 'create',
    ]);
  }

  public function store(Request $request) {
    // Validation cho các trường của customer
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:customers,email',
      'phone' => 'required|numeric|digits_between:10,15|unique:customers,phone',
    ], [
      'name.required' => 'Tên khách hàng là bắt buộc.',
      'name.string' => 'Tên khách hàng phải là chuỗi ký tự.',
      'name.max' => 'Tên khách hàng không được vượt quá 255 ký tự.',
      'email.required' => 'Email là bắt buộc.',
      'email.email' => 'Email phải đúng định dạng.',
      'email.unique' => 'Email này đã được sử dụng.',
      'phone.required' => 'Số điện thoại là bắt buộc.',
      'phone.numeric' => 'Số điện thoại phải là số.',
      'phone.digits_between' => 'Số điện thoại phải từ 10 đến 15 chữ số.',
      'phone.unique' => 'Số điện thoại này đã được sử dụng.',
    ]);

    // Thêm dữ liệu vào cơ sở dữ liệu
    Customer::create([
      'name' => $validatedData['name'],
      'email' => $validatedData['email'],
      'phone' => $validatedData['phone'],
    ]);

    return redirect()->route('customer.index')->with('success', 'Khách hàng đã được thêm thành công.');
  }
  public function edit($id) {
    $customer = Customer::findOrFail($id);
    return view('customer.form', [
      'mode' => 'update',
      'customer' => $customer,
    ]);
  }
  public function update(Request $request, $id) {
    $customer = Customer::findOrFail($id);
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => [
        'required',
        'string',
        'max:255',
        Rule::unique('customers', 'email')->ignore($customer->id, 'id'),
      ],
      'phone' => 'required|numeric|digits_between:10,15|',
    ], [
      'name.required' => 'Tên khách hàng là bắt buộc.',
      'name.string' => 'Tên khách hàng phải là chuỗi ký tự.',
      'name.max' => 'Tên khách hàng không được vượt quá 255 ký tự.',
      'email.required' => 'Email là bắt buộc.',
      'email.email' => 'Email phải đúng định dạng.',
      'email.unique' => 'Email này đã được sử dụng.',
      'phone.required' => 'Số điện thoại là bắt buộc.',
      'phone.numeric' => 'Số điện thoại phải là số.',
      'phone.digits_between' => 'Số điện thoại phải từ 10 đến 15 chữ số.',
      'phone.unique' => 'Số điện thoại này đã được sử dụng.',
    ]);
    $customer->update($request->all());
    return redirect()->route('customer.index')->with('success', 'Cập nhật khách hàng thành công!');
  }

  public function renderDelete($id) {
    $customer = Customer::findOrFail($id);
    return view('customer.form', [
      'mode' => 'delete',
      'customer' => $customer,
    ]);
  }

  public function destroy($id) {
    $customer = Customer::findOrFail($id);
    try {
      $customer->delete();
    } catch (\Throwable $th) {
      return redirect()->route('customer.index')->with(['err' => 'Không thể xóa!']);
    }
    return redirect()->route('customer.index')->with('success', 'Khách hàng đã bị xóa!');
  }

}
