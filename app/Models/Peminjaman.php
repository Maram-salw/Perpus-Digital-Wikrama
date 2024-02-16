<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table="peminjamans";
    protected $fillable =
     ['IUD','tgl_pinjam','tgl_balik','judul','nama_pet','nama','no_hp'];
}
