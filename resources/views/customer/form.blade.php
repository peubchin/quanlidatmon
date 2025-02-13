@extends('layout.app')

@section('head')
  <title>Customer</title>
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
      khách hàng
    </h1>
  </div>
  <div class="card">
    <div class="card-body">

      <!-- Form chỉnh sửa -->
      @if ($mode == 'create')
        <form action="{{ route('customer.store') }}" method="POST">
      @elseif ($mode == 'update')
        <form action="{{ route('customer.update', $customer->id) }}"
          method="POST">
        @method('PUT')
      @else
        <form action="{{ route('customer.destroy', $customer->id) }}"
          method="POST">
        @method('DELETE')
      @endif
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">
          Tên khách hàng
        </label>
        <input type="text" name="name" id="name"
          class="form-control @error('name') is-invalid @enderror"
          @isset($customer)
            value="{{ old('name', $customer->name) }}"
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
        <label for="phone" class="form-label">
          SDT
        </label>
        <input type="phone" name="phone" id="phone"
          class="form-control @error('phone') is-invalid @enderror"
          @isset($customer)
            value="{{ old('phone', $customer->phone) }}"
          @endisset
          value="{{ old('phone') }}"
          {{ $mode != 'delete' ?: 'readonly' }}>
        @error('phone')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">
          Email
        </label>
        <input type="email" name="email" id="email"
          class="form-control @error('email') is-invalid @enderror"
          @isset($customer)
            value="{{ old('email', $customer->email) }}"
          @endisset
          value="{{ old('email') }}"
          {{ $mode != 'delete' ?: 'readonly' }}>
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <!-- Nút hành động -->
      <button type="submit" class="btn btn-primary">Ok</button>
      <a href="{{ route('customer.index') }}" class="btn btn-secondary">
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
