<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Keranjang;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    public function create()
    {
        return view('tambahalamat');
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        $validatedData = $request->validate([
            'nama_alamat' => ['required', 'string', 'max:255'],
            'nama_penerima' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:30'],
            'state' => ['required', 'string', 'max:30'],
            'zip_code' => ['required', 'string', 'max:30'],
            'description' => ['required', 'string', 'max:500'],
        ]);

        $validatedData['user_id'] = $userId;

        

        Alamat::create($validatedData);
        return redirect('/alamat')->with('success', 'Create Address Sucessfull! ');

    }

    public function edit($id)
    {
        $alamat = Alamat::findOrFail($id);

        return view('editalamat', compact('alamat'));
    }

    public function update(Request $request, $id)
    {
        $alamat = Alamat::findOrFail($id);

        $alamat->update($request->all());

        return redirect()->route('alamat')->with('success', 'Address updated successfully');
    }


    public function destroy($id)
    {
        $alamat = Alamat::findOrFail($id);

        $alamat->delete();

        return redirect()->route('alamat')->with('success', 'Address deleted successfully');
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);
        $userId = Auth::id();

        $cartItem = Keranjang::where('user_id', $userId)->where('product_id', $productId)->first();

        if ($cartItem) {
            // If product already in the cart, increase the quantity
            $cartItem->jumlah += 1;
            $cartItem->save();
        } else {
            Keranjang::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'jumlah' => 1,
            ]);
        }

        $cartItemsCount = Keranjang::where('user_id', $userId)->count();

        // Kirim jumlah item ke tampilan menggunakan View::share()
        View::share('cartItemsCount', $cartItemsCount);
        return redirect()->route('products')->with('success', 'Product added to cart successfully!');
    }

    public function index()
    {
        $userId = Auth::id();
        $alamats = Alamat::where('user_id', $userId)->get();
        $cartItems = Keranjang::with('product')->where('user_id', $userId)->get();

        $totalPrice = $cartItems->sum(function ($item) {
            return $item->jumlah * $item->product->price;
        });

        return view('cart.index', compact('cartItems','totalPrice', 'alamats'));
    }

   
    public function updateQuantity(Request $request, $id)
    {
        $cartItem = Keranjang::findOrFail($id);
        $cartItem->jumlah = $request->input('jumlah');
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function destroy1($id)
    {
        $cartItem = Keranjang::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully!');
    }

    public function showCart()
{
    $cartItems = Keranjang::where('user_id', auth()->id())->get();
    $totalPrice = $cartItems->sum(function ($item) {
        return $item->jumlah * $item->product->price;
    });

    return view('cart', compact('cartItems', 'totalPrice'));
}

public function storeOrder(Request $request)
    {
        $userId = Auth::id();
        
        $cartItems = Keranjang::with('product')->where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $totalPrice = $cartItems->sum(function ($item) {
            return $item->jumlah * $item->product->price;
        });

        $order = Order::create([
            'user_id' => $userId,
            'alamat_id' => $request->input('alamat_id'),
            'total_price' => $totalPrice,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->jumlah,
                'price' => $item->product->price,
            ]);
        }

        Keranjang::where('user_id', $userId)->delete();

        return redirect()->route('home', $order->id)->with('success', 'Order successfully created!');
    }

    public function showOrders()
    {
        $userId = Auth::id();
        $orders = Order::where('user_id', $userId)->with('items.product')->get();

        return view('order', compact('orders'));
    }

    public function confirmOrder(Request $request, $order_id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($order_id);

        $order->update(['status' => 'Pesanan Selesai']);

        return redirect()->route('orders.index')->with('success', 'Pesanan telah dikonfirmasi sebagai selesai.');
    }

    public function adminShowOrders()
    {
        $orders = Order::with('alamat', 'items.product')->get();
        return view('listOrderAdmin', compact('orders'));
    }

    public function changeStatus(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders')->with('success', 'Order status updated successfully.');
    }

    public function orderDetails($id)
    {
        $order = Order::with(['user', 'alamat', 'items.product'])->findOrFail($id);
        return view('detailOrderAdmin', compact('order'));
    }

    // Existing methods...

    public function confirmOrderAdmin(Request $request, $order_id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($order_id);
        $order->update(['status' => 'Pesanan Selesai']);
        return redirect()->route('orders.index')->with('success', 'Pesanan telah dikonfirmasi sebagai selesai.');
    }

}
