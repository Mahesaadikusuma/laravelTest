<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uuid extends Model
{
    use HasFactory, HasUuids;

    protected $connection = 'mysql';
    protected $table = 'uuid';
    public $incrementing = false;
    protected $fillable = ['name'];

    public function getkeyType()
    {
        return 'string';
    }
}
