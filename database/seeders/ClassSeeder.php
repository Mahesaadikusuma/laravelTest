<?php

namespace Database\Seeders;

use App\Models\classRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
           ["name"  => '1A' ],
           ["name"  => '1B' ],
           ["name"  => '1C' ],
           ["name"  => '1D' ],
           ["name"  => '1E' ],
        ];
        foreach ($data as $item) {
            classRoom::insert([
            'name' => $item['name'],
            ]);
        }
    }
}
