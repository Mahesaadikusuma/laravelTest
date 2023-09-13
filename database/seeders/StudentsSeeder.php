<?php

namespace Database\Seeders;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //     Schema::disableForeignKeyConstraints();

    //     $data = [
    //        ["name"  => 'aidu' ,"gender" => 'L',"nis" => '0010023', 'class_id' => 1],
    //        ["name"  => 'decvr' ,"gender" => 'P',"nis" => '001233', 'class_id' => 2],
    //        ["name"  => 'jsdak' ,"gender" => 'L',"nis" => '001234', 'class_id' => 2],
    //        ["name"  => 'hgkos' ,"gender" => 'L',"nis" => '004545', 'class_id' => 1],
    //        ["name"  => 'ayu' ,"gender" => 'P',"nis" => '0024234', 'class_id' => 2],
    //     ];

    //    foreach ($data as $item) {
    //        Student::insert([
    //             'name' => $item['name'],
    //             "gender" => $item['gender'],
    //             "nis" => $item['nis'],
    //             "class_id" => $item['class_id'],
    //             'updated_at' => Carbon::now(),
    //             'created_at' => Carbon::now(),
    //        ]);

    //    }

    Student::factory()->create();
    }
}
