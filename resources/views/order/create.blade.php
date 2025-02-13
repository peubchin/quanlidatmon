@extends('layout.app')
@section('title')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tạo đơn hàng</h1>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Hiển thị lỗi nếu có -->
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Chọn nhân viên</label>
                    <select name="employeeId" class="form-control mb-3">
                      {{-- <option value="">Để trống</option> --}}
                        @foreach ($employees as $employee)
                            <option value={{ $employee->id }}>
                                {{ $employee->id }} - {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                    <label class="form-label">Chọn khách hàng</label>
                    <select name="customerId" class="form-control mb-3">
                      {{-- <option value="">Để trống</option> --}}
                        @foreach ($customers as $customer)
                            <option value={{ $customer->id }}>
                                {{ $customer->name }} - {{ $customer->phone }}
                            </option>
                        @endforeach
                    </select>
                    <label class="form-label">Chọn bàn</label>
                    <select name="tableId" class="form-control mb-3">
                        @foreach ($tables as $table)
                            <option value={{ $table->id }}>
                                {{ $table->name }} - {{ $table->seats }} chỗ
                            </option>
                        @endforeach
                    </select>
                    <!-- Hiển thị lỗi cụ thể cho trường 'ten-phong-ban' -->
                    @error('ten-phong-ban')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <!-- Hiển thị SweetAlert2 khi có thông báo thành công -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: "{{ session('success') }}",
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- Hiển thị SweetAlert2 khi có lỗi -->
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                html: `
            <div style="text-align: left;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        `,
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
