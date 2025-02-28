<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt món</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    @include('components.navbar')
    <!-- Hero Section -->
    <header class="bg-dark text-white text-center py-5">
        <h1>Welcome to Our Restaurant</h1>
        <p class="lead">Delicious meals crafted with love</p>
        <a href="/" class="btn btn-warning mt-3">View Menu</a>
    </header>

    <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item">
      <img src="{{asset('img/spaces/space1.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="{{asset('img/spaces/space2.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="{{asset('img/spaces/space3.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="{{asset('img/spaces/space4.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="{{asset('img/spaces/space5.jpg')}}" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <!-- Menu Section -->
    <section id="menu" class="container py-5">
        <h2 class="text-center mb-4">Special Dishes</h2>
        <div class="row">
            @foreach ($foodItems as $foodItem)           
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{asset('storage/' . $foodItem->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$foodItem->name}}</h5>
                            <p class="card-text">Creamy Alfredo sauce with fresh herbs.</p>
                            <p class="text-primary">{{$foodItem->price}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- About Section -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2>About Us</h2>
            <p>We bring the finest ingredients and recipes from around the world to your plate.</p>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="container py-5">
        <h2 class="text-center">What Our Customers Say</h2>
        <div class="row">
            <div class="col-md-6">
                <blockquote class="blockquote">
                    <p>"Absolutely the best dining experience I've had in years!"</p>
                    <footer class="blockquote-footer">John Doe</footer>
                </blockquote>
            </div>
            <div class="col-md-6">
                <blockquote class="blockquote">
                    <p>"Delicious food, great ambiance, and fantastic service!"</p>
                    <footer class="blockquote-footer">Jane Smith</footer>
                </blockquote>
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