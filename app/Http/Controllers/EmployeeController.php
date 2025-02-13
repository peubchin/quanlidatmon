<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller {
  public function index() {
    $employees = Employee::get();
    return view('employee.index')->with('employees', $employees);
  }

  public function create() {
    $departments = Department::get();
    return view('employee.form')->with([
      'mode' => 'create',
      'departments' => $departments,
    ]);
  }

  public function store(Request $request) {
    // Validation
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:employees',
      'phone' => 'required|string|max:20',
      'department_id' => 'required|exists:departments,id',
    ], [
      'name.required' => 'Tên nhân viên là bắt buộc.',
      'email.required' => 'Email là bắt buộc.',
      'email.email' => 'Email không đúng định dạng.',
      'email.unique' => 'Email đã tồn tại.',
      'phone.required' => 'Số điện thoại là bắt buộc.',
      'department_id.required' => 'Phòng ban là bắt buộc.',
      'department_id.exists' => 'Phòng ban không tồn tại.',
    ]);

    // Create new employee
    Employee::create([
      'name' => $validatedData['name'],
      'email' => $validatedData['email'],
      'phone' => $validatedData['phone'],
      'department_id' => $validatedData['department_id'],
    ]);

    return redirect()->route('employee.index')->with('success', 'Nhân viên đã được thêm thành công.');
  }

  public function edit($id) {
    $departments = Department::get();

    $employee = Employee::findOrFail($id); // Lấy dữ liệu nhân viên theo ID
    return view('employee.form', [
      'mode' => 'update',
      'employee' => $employee,
      'departments' => $departments,
    ]);
  }

  // Xử lý cập nhật dữ liệu
  public function update(Request $request, $id) {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:employees,email,' . $id,
      'phone' => 'required|string|max:15',
      'department_id' => 'required|integer',
    ]);

    $employee = Employee::findOrFail($id);
    $employee->update($request->all());

    return redirect()->route('employee.index')->with('success', 'Cập nhật nhân viên thành công.');
  }

  public function renderDelete($id) {
    $departments = Department::get();

    $employee = Employee::findOrFail($id); // Lấy dữ liệu nhân viên theo ID
    return view('employee.form', [
      'mode' => 'delete',
      'employee' => $employee,
      'departments' => $departments,
    ]);
  }

  public function destroy($id) {
    $employee = Employee::findOrFail($id);
    try {
      $employee->delete();
    } catch (\Exception $e) {
      return redirect()->route('employee.index')->with(['err' => 'Không thể xóa!']);
    }
    return redirect()->route('employee.index')->with('success', 'Xóa thông tin thành công!');
  }
}
