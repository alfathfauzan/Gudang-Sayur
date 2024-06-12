<?php

use App\Models\Blog;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Middleware\Authenticate;



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

Route::get('/login', [LoginController::class , 'index'])->middleware('auth');

Route::post('/login', [LoginController::class, 'authenticate']);




Route::get('/register',[RegisterController::class, 'index'] );
Route::post('/register',[RegisterController::class, 'store'] );

Route::get('/', [HomeController::class, "index"]);




Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('login'); 
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/blog',function(){
    $blog = Blog::all();
    return view('blog', ['blogs' => $blog]);
});

Route::get('/products',function(){
    $product = Product::all();
    return view('product',['products' => $product]);
});

// Route::get('/edit-profile', 'ProfileController@edit')->middleware('auth')->name('profile.edit');




// Route::get('/posts', [PostController::class,'index']);




Route::controller(BlogController::class)->group(function (){
    Route::get('blog/{blogPost:slug}', 'show');
     
});




