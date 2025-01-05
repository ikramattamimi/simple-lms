<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assignments')->insert([
            'id' => Str::uuid(),
            'title' => 'Sample Assignment',
            'body' => 'This is a sample assignment body.',
            'is_allowed_multiple_answer' => false,
            'section_id' => DB::table('sections')->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_assignment')->insert([
            'assignment_id' => DB::table('assignments')->first()->id,
            'user_id' => DB::table('users')->first()->id,
            'filename' => 'sample.txt',
            'body' => 'This is a sample submission body.',
            'submitted_at' => now(),
            'grade' => 95.00,
        ]);
    }
}
