<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    // INI DIGUNAKAN JIKA MODEL DAN DATABASENYA BERBEDA NAMA JADI HARUS DI KASIH TAU NAMA TABEL YANG MAU DIISI
    // protected $table = 'Student';

    protected $connection = 'mysql';
    protected $table = 'students';

    protected $fillable = [
        "name",
        "gender",
        "nis",
        "class_id",
        'slug',
        'image',
    ];

    // INI DIGUNAKAN UNTUK TIDAK MENGGUNAKAN AUTO INCREMENT DI IDNYA
    // public $incrementing = false;

    // slug
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    // Many to one
    public function class()
    {
        return $this->belongsTo(classRoom::class, 'class_id', 'id');
    }

    /**
     * The extracurriculars that belong to the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function extracurriculars(): BelongsToMany
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id', 'extracurricular_id')->as('eskul');
        // eskul
        // withTimestamps adalah  Menambahkan tanggal pembuatan dan pembaruan ke tabel pivot 
        // seperti created_at dan updated_at
                
    }
    


    
}
