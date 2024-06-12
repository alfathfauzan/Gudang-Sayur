<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Order;
use Illuminate\Http\Request;
 
class StripeController extends Controller
{
 
    public function session(Request $request, $order_id)
    {
        $user = auth()->user();
        $order = Order::with('items.product')->findOrFail($order_id);

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $productItems = [];

        foreach ($order->items as $item) {
            $product_name = $item->product->product_name; // Ambil nama produk dari relasi
            $total = $item->price; // Ambil harga produk dari relasi
            $quantity = $item->quantity;

            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $product_name,
                    ],
                    'currency' => 'USD',
                    'unit_amount' => $total * 100, // Convert to cents
                ],
                'quantity' => $quantity
            ];
        }

        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items' => $productItems,
            'mode' => 'payment',
            'allow_promotion_codes' => true,
            'metadata' => [
                'order_id' => $order->id,
                'user_id' => $user->id,
            ],
            'customer_email' => $user->email,
            'success_url' => route('stripe.success', ['order_id' => $order->id]),
            'cancel_url' => route('stripe.cancel'),
        ]);

        return redirect()->away($checkoutSession->url);
    }

    public function success(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->update(['status' => 'sedang dikirim']);

        return view('success');
    }

    public function cancel()
    {
        return view('cancel');
    }

 
    
    
    
}