<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Alamat extends Model
{
    use HasFactory;

    protected $table = "alamats";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        'nama_alamat',
        'nama_penerima',
        'city',
        'state',
        'zip_code',
        'description',
        'user_id', // Pastikan user_id juga diizinkan
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}


