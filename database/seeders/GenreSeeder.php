<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('genres')->insert([
            [
                'name' => 'Action',
                'description' => 'Film dengan banyak adegan aksi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Comedy',
                'description' => 'Film lucu untuk menghibur penonton',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Drama',
                'description' => 'Film dengan cerita emosional',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}