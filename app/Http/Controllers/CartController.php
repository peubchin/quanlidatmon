<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FoodItem;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)->get();
        $total = $cart->sum(fn($item) => $item->price * $item->quantity);
        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request, $id)
    {
        $foodItem = FoodItem::findOrFail($id);
        $userId = Auth::id();

        $cartItem = Cart::where('user_id', $userId)->where('food_item_id', $id)->first();
        
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'food_item_id' => $id,
                'price' => $foodItem->price,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Món ăn đã được thêm vào giỏ hàng!');
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('food_item_id', $id)->first();
        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }
        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        Cart::where('user_id', Auth::id())->where('food_item_id', $id)->delete();
        return redirect()->route('cart.index');
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)->get();
        $total = $cart->sum(fn($item) => $item->price * $item->quantity);
        return view('cart.checkout', compact('cart', 'total'));
    }
    public function processCheckout(Request $request)
    {
        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)->get();
    
        if ($cart->isEmpty()) {
            return redirect()->route('cart.checkout')->with('error', 'Giỏ hàng của bạn đang trống!');
        }
    
        $totalPrice = $cart->sum(fn($item) => $item->price * $item->quantity);
        $shippingFee = $this->calculateShippingFee($request->address); // Tính tiền ship
    
        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => $userId,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'total_price' => $totalPrice,
            'shipping_fee' => $shippingFee,
        ]);
    
        // Xóa giỏ hàng sau khi thanh toán
        Cart::where('user_id', $userId)->delete();
    
        return redirect()->route('menu')->with('success', 'Đơn hàng đã được đặt thành công!');
    }
    
public function calculateShippingFee($address)
{
    // Giả sử có 3 mức ship
    if (str_contains($address, 'Hồ Chí Minh')) {
        return 15000;
    } elseif (str_contains($address, 'Hà Nội')) {
        return 20000;
    } else {
        return 30000; // Ship tỉnh khác
    }
}

}
