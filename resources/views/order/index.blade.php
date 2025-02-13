@extends('layout.app')

@section('title')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách đơn hàng</h1>
        <div>
            <a href="{{ route('order.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Thêm đơn hàng
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã nhân viên</th>
                            <th>Mã khách hàng</th>
                            <th>Mã bàn</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Mã nhân viên</th>
                            <th>Mã khách hàng</th>
                            <th>Mã bàn</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->employee_id }}</td>
                                <td>{{ $order->customer_id }}</td>
                                <td>{{ $order->table_id }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <!-- Nút chỉnh sửa -->
                                    <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                    <!-- Nút xóa -->
                                    <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
