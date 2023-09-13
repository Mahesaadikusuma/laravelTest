<?php

namespace Database\Seeders;

use App\Models\uuid;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UuidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        uuid::factory(5)->create();
        // DB::table('uuid')->truncate();

        // $data = [
        //     'mahesa',
        //     'adi',
        //     'kusuma',
        // ];

        // foreach ($data as $key) {
        //   uuid::create([
        //     'id' => Str::uuid(),
        //     'name' => $key,
            
        //   ]);  
        // }
    }
}
