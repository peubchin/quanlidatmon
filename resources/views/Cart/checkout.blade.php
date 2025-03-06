<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    @include('components.navbar')

    <section class="container py-5">
        <h1 class="text-center">Xác nhận thanh toán</h1>

        @if ($cart->isEmpty())
            <p class="text-center">Giỏ hàng của bạn đang trống.</p>
            <a href="{{ route('menu') }}" class="btn btn-primary d-block mx-auto w-50">Quay lại thực đơn</a>
        @else
            <table class="table table-bordered mt-4">
                <thead class="table-dark">
                    <tr>
                        <th>Món ăn</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{ $item->foodItem->name }}</td>
                            <td>{{ number_format($item->price) }} VNĐ</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price * $item->quantity) }} VNĐ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3 class="text-end">Tổng tiền: <strong class="text-danger">{{ number_format($total) }} VNĐ</strong></h3>

            <!-- Form nhập thông tin -->
            <form action="{{ route('cart.processCheckout') }}" method="POST" class="mt-4">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Họ và tên</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Số điện thoại</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Địa chỉ giao hàng</label>
        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
    </div>

    <!-- Chọn phương thức thanh toán -->
    <div class="mb-3">
        <label for="payment_method" class="form-label">Phương thức thanh toán</label>
        <select class="form-select" id="payment_method" name="payment_method" required>
            <option value="cod">Thanh toán khi nhận hàng (COD)</option>
            <option value="bank_transfer">Chuyển khoản ngân hàng</option>
            <option value="momo">Thanh toán qua MoMo</option>
            <option value="credit_card">Thẻ tín dụng/Ghi nợ</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success btn-lg w-25 m-auto"> Thanh toán ngay</button>
</form>

        @endif
    </section>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
