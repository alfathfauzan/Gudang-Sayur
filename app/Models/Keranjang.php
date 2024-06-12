<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;




class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjangs';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    public $timestamps = false;

    protected $fillable = ['id_keranjang','jumlah','user_id','product_id'];

     /**
     * Get the user that owns the Keranjang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo   
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
