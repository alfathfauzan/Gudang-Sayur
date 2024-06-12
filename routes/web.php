<?php

use App\Http\Controllers\AddressController;
use App\Models\Blog;
use App\Models\Post;
use App\Models\Product;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\Alamat;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function(){
    
    
    Route::get('/login', [LoginController::class, 'index'])->name('login') ;
    
    Route::post('/login', [LoginController::class, 'authenticate']);
});


Route::get('admin', [PageController::class, 'admin'])->middleware('auth')->middleware('userAkses:0');
Route::get('/', [PageController::class, 'home'])->name('home');
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/update', function () {
    return view('updateprofile');
})->middleware('auth');
Route::post('profileupdate', [LoginController::class, 'profileupdate'])->middleware('auth')->name('profileupdate');


Route::get('/home', function(){
    return redirect('/');
});

Route::get('/dashboard', function(){
    return view('admindashboard');
});



Route::get('/admin/login', function(){
    return redirect('/');
});


Route::get('/register',[RegisterController::class, 'index'] );
Route::post('/register',[RegisterController::class, 'store'] );






Route::get('/about', function () {
    $userId = Auth::id();
    return view('aboutus',['userId' => $userId]);
});




Route::get('/blog',function(){
    $blog = Blog::all();
    return view('blog', ['blogs' => $blog]);
})->name('blogs');



Route::get('/products',function(){
    $userId = Auth::id();
    $product = Product::all();
    return view('product',['products' => $product],['userId' => $userId]);
})->name('products');



Route::get('/products/create', [ProductController::class, 'create'])->name('product.create')->middleware('auth')->middleware('userAkses:0');

Route::post('/product', [ProductController::class, 'store'])->name('product.store')->middleware('auth')->middleware('userAkses:0');

Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('product.show')->middleware('auth')->middleware('userAkses:0');

Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware('auth')->middleware('userAkses:0');

Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('product.update')->middleware('auth')->middleware('userAkses:0');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('auth')->middleware('userAkses:0');


Route::get('/admin/orders', [OrderController::class, 'adminShowOrders'])->name('admin.orders')->middleware('auth')->middleware('userAkses:0');
Route::post('/admin/orders/{order_id}/status', [OrderController::class, 'changeStatus'])->name('admin.orders.changeStatus')->middleware('auth')->middleware('userAkses:0');
Route::get('/admin/orders/{order_id}', [OrderController::class, 'orderDetails'])->name('admin.orders.details')->middleware('auth')->middleware('userAkses:0');
Route::get('/admin/order/{id}',[OrderController::class, 'orderDetails'])->name('orders.show')->middleware('auth')->middleware('userAkses:0');

// ----------------------------------------------------------------

Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth')->middleware('userAkses:0');

Route::post('/blog', [BlogController::class, 'store'])->name('blog.store')->middleware('auth')->middleware('userAkses:0');

Route::get('/blogs/show/{id}', [BlogController::class, 'shows'])->name('blog.show')->middleware('auth')->middleware('userAkses:0');

Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit')->middleware('auth')->middleware('userAkses:0');

Route::get('/blogs/update/{id}', [BlogController::class, 'update'])->name('blog.update')->middleware('auth')->middleware('userAkses:0');

Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blog.destroy')->middleware('auth')->middleware('userAkses:0');

Route::middleware('auth')->group(function () {
    // Route to add a product to the cart
    Route::post('cart/add', [OrderController::class, 'addToCart'])->name('cart.add');

    // Route to view the cart
    Route::get('cart', [OrderController::class, 'index'])->name('cart.index');

    Route::post('cart/update/{id}', [OrderController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::delete('cart/delete/{id}', [OrderController::class, 'destroy1'])->name('cart.destroy');
});


Route::get('carts', [CartController::class, 'index1'])->name('cart.index1');

Route::post('/stripe/session/{order_id}', [StripeController::class, 'session'])->name('stripe.session');
Route::get('/stripe/success/{order_id}', [StripeController::class, 'success'])->name('stripe.success');
Route::get('/stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');

// Route::get('/edit-profile', 'ProfileController@edit')->middleware('auth')->name('profile.edit');




// Route::get('/posts', [PostController::class,'index']);




Route::get('/alamat/create', [OrderController::class, 'create'])->middleware('auth');
Route::post('/alamat', [OrderController::class, 'store'])->name('alamatstore')->middleware('auth');

Route::get('/alamat',function(){
    $userId = Auth::id();
    $alamat = Alamat::where('user_id', $userId)->get();
    return view('alamat',['alamats' => $alamat],['userId' => $userId]);
})->name('alamat');
Route::get('/alamat/edit/{id}', [OrderController::class, 'edit'])->name('alamatedit')->middleware('auth');
Route::put('/alamat/update/{id}', [OrderController::class, 'update'])->name('alamatupdate')->middleware('auth');

Route::delete('/alamat/{id}', [OrderController::class, 'destroy'])->name('alamatdestroy')->middleware('auth');

Route::post('orders', [OrderController::class, 'storeOrder'])->name('orders.store');

Route::get('/orders', [OrderController::class, 'showOrders'])->name('orders.index');

Route::post('/order/confirm/{order_id}', [OrderController::class, 'confirmOrder'])->name('order.confirm');


Route::controller(BlogController::class)->group(function (){
    Route::get('blog/{blogPost:slug}', 'show');
     
});




