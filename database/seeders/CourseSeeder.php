<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            'id' => Str::uuid(),
            'title' => 'Ecofarming',
            'description' => 'E-Modul Pertanian Ramah Lingkungan (Ecofarming).',
            'image' => 'ecofarming-sample.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // DB::table('courses')->insert([
        //     'id' => Str::uuid(),
        //     'title' => 'Modul Beta',
        //     'description' => 'Beta testing.',
        //     'image' => 'modul-beta.jpg',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        DB::table('user_course')->insert([
            'course_id' => DB::table('courses')->first()->id,
            'user_id' => DB::table('users')->first()->id,
            'is_active' => true,
        ]);
    }
}
