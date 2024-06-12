<?php

namespace App\Models;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $keyType='integer';
    public $timestamps = false;

    protected $fillable = ['product_name','product_image','price'];

    protected static function booted():void
    {
        parent::booted();
        self::addGlobalScope(new IsActiveScope());
    }

    public function likedByUsers(): BelongsToMany
    {
        return $this -> belongsToMany(User::class, "users_likes_products","product_id","user_id");
    }

    public function cartItems(){
        return $this->hasMany(Keranjang::class);
    }

    
    
}
