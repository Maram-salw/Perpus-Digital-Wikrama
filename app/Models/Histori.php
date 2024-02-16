<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    use HasFactory;
    protected $fillable = ['IUD', 
    'judul',
    'nama',
    'nama_pet',
    'no_hp',
    'tgl_pinjam',
    'tgl_balik'];
}