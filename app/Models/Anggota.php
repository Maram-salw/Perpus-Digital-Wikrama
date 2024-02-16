<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    use HasFactory;
    protected $fillable = [
        'IUD',
        'nama',
         'jk',
          'no_hp',
           'alamat'
        ];
}
