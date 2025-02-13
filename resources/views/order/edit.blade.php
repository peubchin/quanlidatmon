@extends('layout.app')
@section('title')
    Chỉnh sửa Đơn Hàng
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('order.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Chọn khách hàng -->
                <div class="mb-3">
                    <label for="customer_id" class="form-label">Khách Hàng</label>
                    <select class="form-control @error('customer_id') is-invalid @enderror" name="customer_id">
                        <option value="">-- Chọn khách hàng --</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}"
                                {{ $customer->id == $order->customer_id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Chọn nhân viên -->
                <div class="mb-3">
                    <label for="employee_id" class="form-label">Nhân Viên</label>
                    <select class="form-control @error('employee_id') is-invalid @enderror" name="employee_id">
                        <option value="">-- Chọn nhân viên --</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"
                                {{ $employee->id == $order->employee_id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Nhập thông tin bàn -->
                <div class="mb-3">
                    <label for="table" class="form-label">Bàn</label>
                    <select class="form-control @error('table_id') is-invalid @enderror" name="table_id">
                        <option value="">-- Chọn bàn --</option>
                        @foreach ($tables as $table)
                            <option value="{{ $table->id }}"
                                {{ $table->id == $order->table_id ? 'selected' : '' }}>
                                {{ $table->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Nút hành động -->
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                <a href="{{ route('order.index') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
@endsection
