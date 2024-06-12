<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    public $timestamps = false;

    protected $fillable = ['judul_blog','slug','blog_image','author','isi'];
    
}
