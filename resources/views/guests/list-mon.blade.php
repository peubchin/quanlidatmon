<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đặt món</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body class="">
  @include('components.navbar')
  <!-- Hero Section -->
  <section class="container py-5 px-3">
  <div class="">
    <h1 class="text-center">Thực Đơn</h1>
    <!-- Bộ lọc theo loại món ăn -->
    <div class="mb-4">
      <a href="{{ route('menu') }}" class="btn btn-secondary">Tất cả</a>
      @foreach($foodTypes as $type)
      <a href="{{ route('menu', ['food_type' => $type->id]) }}" class="btn btn-primary">{{ $type->name }}</a>
    @endforeach
    </div>

    <!-- Dropdown sắp xếp giá -->
    <form method="GET" action="{{ route('menu') }}">
      <input type="hidden" name="food_type" value="{{ request('food_type') }}">
      <select name="sort" onchange="this.form.submit()" class="form-select">
        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
      </select>
    </form>
  </div>

  <div class="row my-3">
    @foreach($foodItems as $food)
    <div class="col-md-4">
      <div class="card mb-4">
      <img src="{{asset('storage/' . $food->image)}}" class="card-img-top" alt="{{ $food->name }}">
      <div class="card-body">
        <h5 class="card-title">{{ $food->name }}</h5>
        <p class="card-text">{{ $food->foodType->name }}</p>
        <p class="card-text">Giá: {{ number_format($food->price) }} VNĐ</p>
      </div>
      </div>
    </div>
  @endforeach
  </div>
  </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="bg-dark text-white py-5 text-center">
    <h2>Contact & Reservations</h2>
    <p>📍 123 Main Street, Your City | 📞 (123) 456-7890</p>
    <a href="tel:1234567890" class="btn btn-warning">Call Now</a>
  </section>

  <!-- Footer -->
  <footer class="bg-black text-white text-center py-3">
    <p>&copy; 2025 Restaurant Name. All Rights Reserved.</p>
  </footer>

</body>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('vendor/sweetalert2/sweetalert2.all.min.js')}}"></script>
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

</html>