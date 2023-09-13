<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Teacher extends Model
{
    use HasFactory;


    /**
     * Get the class associated with the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function class(): HasOne
    {
        return $this->hasOne(classRoom::class, 'teacher_id', 'id');
    }
}
