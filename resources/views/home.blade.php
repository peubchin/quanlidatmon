<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Name</title>
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

    <!-- Menu Section -->
    <section id="menu" class="container py-5">
        <h2 class="text-center mb-4">Our Menu</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://source.unsplash.com/300x200/?food,pasta" class="card-img-top" alt="Dish">
                    <div class="card-body">
                        <h5 class="card-title">Pasta Special</h5>
                        <p class="card-text">Creamy Alfredo sauce with fresh herbs.</p>
                        <p class="text-primary">$12.99</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://source.unsplash.com/300x200/?burger" class="card-img-top" alt="Dish">
                    <div class="card-body">
                        <h5 class="card-title">Gourmet Burger</h5>
                        <p class="card-text">Juicy beef patty with melted cheese.</p>
                        <p class="text-primary">$10.99</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://source.unsplash.com/300x200/?steak" class="card-img-top" alt="Dish">
                    <div class="card-body">
                        <h5 class="card-title">Grilled Steak</h5>
                        <p class="card-text">Tender steak with garlic butter sauce.</p>
                        <p class="text-primary">$18.99</p>
                    </div>
                </div>
            </div>
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
