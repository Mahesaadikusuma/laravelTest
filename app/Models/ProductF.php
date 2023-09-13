<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// INI ADALAH MODEL UNTUK MULTIPLE DATABASE
class ProductF extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'products';

    
    // INI MULTIPLE DATABASE
    /**
     * Get the user that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'categories_id', 'id');
    }
    
}
