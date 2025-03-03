<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('/assets/logo.png') }}" alt="" srcset="" width="50px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('menu') }}">Món ăn</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/">Đơn mua</a>
        </li>
        @guest
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
      </li>
    @endguest
        @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ auth()->user()->name }}
        </a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Hồ sơ</a></li>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
          @csrf
          <button class="dropdown-item">Đăng xuất
          </button>
        </form>
        </ul>
      </li>
      @if(auth()->user() && in_array(auth()->user()->role, ['admin', 'staff']))
      <li class="nav-item">
      <a class="nav-link" href="{{ route('manage.dashboard') }}">Quản lý</a>
      </li>
    @endif
    @endauth
      </ul>
      <form class="d-flex align-left" role="search">
        <input class="form-control me-3" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a href="/user" class="me-3">
        <div class="rounded-circle bg-dark d-flex justify-content-center align-items-center"
          style="width: 50px;height:50px;">
          <i class="fa-solid fa-user fa-2xl"></i>
        </div>
      </a>
    </div>
  </div>
</nav>