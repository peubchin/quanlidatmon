@extends('layout.app')

@section('head')
  <title>Employee</title>
@endsection

@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
      @if ($mode == 'create')
        Thêm
      @elseif ($mode == 'update')
        Sửa
      @else
        Xóa
      @endif
      nhân viên
    </h1>
  </div>
  <div class="card">
    <div class="card-body">
      <!-- Form -->
      @if ($mode == 'create')
        <form action="{{ route('employee.store') }}" method="POST">
      @elseif ($mode == 'update')
        <form action="{{ route('employee.update', $employee->id) }}"
          method="POST">
        @method('PUT')
      @else
        <form action="{{ route('employee.destroy', $employee->id) }}"
          method="POST">
        @method('DELETE')
      @endif

      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">
          Tên nhân viên
        </label>
        <input type="text" name="name" id="name"
          class="form-control @error('name') is-invalid @enderror"
          @isset($employee)
            value="{{ old('name', $employee->name) }}"
          @endisset
          value="{{ old('name') }}"
          {{ $mode != 'delete' ?: 'readonly' }}>
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">
          Email
        </label>
        <input type="text" name="email" id="email"
          class="form-control @error('email') is-invalid @enderror"
          @isset($employee)
            value="{{ old('email', $employee->email) }}"
          @endisset
          value="{{ old('email') }}"
          {{ $mode != 'delete' ?: 'readonly' }}>
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">
          Phone
        </label>
        <input type="text" name="phone" id="phone"
          class="form-control @error('phone') is-invalid @enderror"
          @isset($employee)
            value="{{ old('phone', $employee->phone) }}"
          @endisset
          value="{{ old('phone') }}"
          {{ $mode != 'delete' ?: 'readonly' }}
          >
        @error('phone')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="department_id" class="form-label">
          Department
        </label>
        <select
          name="department_id"
          id="department_id"
          @isset($employee)
            value="{{ old('department_id', $employee->department_id) }}"
          @endisset
          value="{{ old('department_id') }}"
          {{ $mode != 'delete' ?: 'readonly' }}
          class="form-control @error('department_id') is-invalid @enderror"
        >
          @foreach ($departments as $department)
            <option value="{{ $department->id }}">
              {{ $department->name }}
            </option>
          @endforeach
        </select>
        @error('department_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <!-- Nút hành động -->
      <button type="submit" class="btn btn-primary">Ok</button>
      <a href="{{ route('employee.index') }}" class="btn btn-secondary">
        Quay lại
      </a>
      </form>
    </div>
  </div>
@endsection

@section('script')
  <script>
    @foreach ($errors->all() as $error)
      console.warn(`{{ $error }}`)
    @endforeach
  </script>
@endsection
