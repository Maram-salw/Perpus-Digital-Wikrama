<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $fillable = ['IUD','judul', 'pengarang', 'penerbit', 'kategori', 'tahun'];
}
