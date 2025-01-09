<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = \App\Models\Course::first();
        $course->chapters()->createMany([
            ['title' => 'Kata Pengantar'],
            ['title' => 'Glosarium'],
            ['title' => 'Peta Konsep'],
            ['title' => 'Pendahuluan'],
            ['title' => 'Kegiatan Pembelajaran 1.1', 'description' => 'Pengenalan Ecofarming'],
            ['title' => 'Kegiatan Pembelajaran 1.2', 'description' => 'Bentuk-bentuk Praktek Ecofarming'],
            ['title' => 'Kegiatan Pembelajaran 1.3', 'description' => 'Ecofarming dan Pemanasan Global'],
            ['title' => 'Kegiatan Pembelajaran 1.4', 'description' => 'Pemanasan Global dan Jejak Karbon (Carbon Footprint)'],
            ['title' => 'Kegiatan Pembelajaran 1.5', 'description' => 'Perubahan Iklim dan Pertanian'],
            ['title' => 'Kegiatan Pembelajaran 2', 'description' => 'Tahap Kontekstualisasi'],
            ['title' => 'Kegiatan Pembelajaran 3', 'description' => 'Tahap Realisasi Lembar Kerja Peserta Didik'],
        ]);

    }
}
