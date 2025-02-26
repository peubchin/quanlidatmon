@extends('layouts.dash')

@section('head')
  <title></title>
@endsection

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
      <a href="{{ route('food-types.index') }}">
        Loại món
      </a>
    </h1>
    <div>
      <a href="{{ route('food-types.create') }}"
        class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-upload fa-sm text-white-50"></i>
        Tạo
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%"
              cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($foodTypes as $foodType)
                  <tr>
                    <td>{{ $foodType->id }}</td>
                    <td>{{ $foodType->name }}</td>
                    <td>
                      <a href="{{ route('food-types.edit', $foodType) }}"
                        class="btn btn-sm btn-warning">Sửa</a>
                      <form
                        action="{{ route('food-types.destroy', $foodType) }}"
                        method="POST"
                        class="d-inline"
                        >
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Xóa</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  @if (session('error'))
    <script>
      Swal.fire({
        icon: 'warning',
        title: 'Lỗi',
        text: '{{ session('error') }}',
        confirmButtonColor: '#4e73df',
      })
    </script>
  @endif
@endsection
