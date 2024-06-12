<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
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
        $cartItems = Keranjang::with('product')->where('user_id', $userId)->get();

        $totalPrice = $cartItems->sum(function ($item) {
            return $item->jumlah * $item->product->price;
        });

        return view('cart.index', compact('cartItems','totalPrice'));
    }

    public function index1()
    {
        

        return view('cart.index1');
    }

    public function updateQuantity(Request $request, $id)
    {
        $cartItem = Keranjang::findOrFail($id);
        $cartItem->jumlah = $request->input('jumlah');
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function destroy($id)
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
}

