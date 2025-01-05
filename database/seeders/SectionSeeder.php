<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            'id' => Str::uuid(),
            'title' => 'Sample Section',
            'body' => 'This is a sample section body.',
            'course_id' => DB::table('courses')->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_section')->insert([
            'user_id' => DB::table('users')->first()->id,
            'section_id' => DB::table('sections')->first()->id,
            'is_completed' => true,
            'completion_date' => now(),
        ]);
    }
}
