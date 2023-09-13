<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class classRoom extends Model
{
    use HasFactory;

    
    protected $connection = 'mysql';
    protected $table = 'class';
    
    protected $fillable = [
        'name',
        'teacher_id',
    ];

    /**
     * Get the student associated with the classRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    //  one to many
    public function student(): HasMany
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }   

    /**
     * Get the teacher that owns the classRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    //  INI JIKA PENGGUNAANYA HASMANY 
    // FOREIGN KEYNYA ID TEACHER DAN LOCAL KEYNYA TEACHER_ID DARI TABEL CLASS
    // public function teacher(): HasMany
    // {
    //     return $this->hasMany(Teacher::class, 'id', 'teacher_id');
    // }


    /**
     * Get the user that owns the classRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
    

    // INI MULTIPLE DATABASE
    /**
     * Get the user that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(ProductF::class, 'product_id', 'id');
    }
}
