@extends('layout.app')

@section('head')
  <title>Employee</title>
@endsection

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
      Danh sách phòng ban
    </h1>
    <div>
      <a href="{{ route('employee.create') }}"
        class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i>
        Tạo
      </a>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%"
          cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên</th>
              <th>Email</th>
              <th>SDT</th>
              <th>Phòng</th>
              <th></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Tên</th>
              <th>Email</th>
              <th>SDT</th>
              <th>Phòng</th>
              <th></th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($employees as $employee)
              <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->department->name }}</td>
                <td>
                  <a href="{{ route('employee.edit', $employee->id) }}"
                    class="btn btn-sm btn-primary">Edit</a>
                  <form
                    action="{{ route('employee.destroy', $employee->id) }}"
                    method="POST"
                    class="d-inline"
                    >
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger">Delete</button>
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

@section('script')
  @if (session('err'))
    <script>
      Swal.fire({
        icon: 'warning',
        title: 'Lỗi',
        text: '{{ session('err') }}',
        confirmButtonColor: '#4e73df',
      })
    </script>
  @endif
@endsection
