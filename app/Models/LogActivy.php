<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivy extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        
    ];

    // protected $table = 'asdasd'; // ini tes jika error dari database transaction
    // JIKA TERJADI SALAH SATU NYA ERROR MAKA DATA DARI KEDUA TABLE TIDAK AKAN MENAMBAHKAN DATA INI BERLAKU JIKA MENGGUNAKAN DATABASE TRASACTION
    
    // DAN JIKA JIKA TIDAK MENGGUNAKAN DATABASE TRASACTION MAKA SALAH SATU TABLE AKAN MENAMBAHKAN DATA BARU JIKA SALAH SATUNYA TABLENYA ERROR
}
