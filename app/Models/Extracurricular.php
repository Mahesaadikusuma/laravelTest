<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Extracurricular extends Model
{
    use HasFactory;

    protected $table = 'extracurriculars';

    protected $fillable = [
        'name'
    ];


    /**
     * The roles that belong to the extracurricular
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function student(): BelongsToMany
    {   
        return $this->belongsToMany(Student::class, 'student_extracurricular', 'extracurricular_id', 'student_id');
    }

    
    
    
}
