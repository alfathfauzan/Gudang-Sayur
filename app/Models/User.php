<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Alamat;
use App\Models\Product;
use App\Models\Keranjang;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;




class User extends Authenticatable
{
    use  HasFactory, Notifiable;

     protected $table = 'users';
     protected $primaryKey = 'id'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    public function cartItems(){
        return $this ->hasMany(Keranjang::class);
    }
    public function likeProducts(): BelongsToMany
    {
        return $this -> BelongsToMany(Product::class, "users_likes_products", "user_id","product_id" );
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function alamats(): HasMany
    {
        return $this->hasMany(Alamat::class,"user_id","id");
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    
}
