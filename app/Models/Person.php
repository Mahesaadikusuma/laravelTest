<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;
    protected $table = 'persons';
    protected $fillable = [
        'first_name',
        'last_name',
    ];


     /**
     * Get the Person's first name.
     */
    // protected function firstName(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => ucfirst($value),
    //     );
    // }


    protected function FullName(): Attribute
    {
        return Attribute::make(
            // $VALUE DIGUNAKAN UNTUK JIKA COLUMN PADA TABEL TIDAK ADA 
            // JADINYA MENGGUNAKAN VALUE UNTUK MEDEFINISIKAN FULL_NAMENYA 
            get: fn ($value, $atribute) => $atribute['first_name']. ' '. $atribute['last_name'],
        );
    }

    public function getUpperCaseAttribute()
    {
        return Str::upper($this->attributes['first_name']);
    }


    protected function firstName(): Attribute
    {
        return Attribute::make(
            
            set: fn ($value) => strtoupper($value),
        );
    }


   

    
}
