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
        $pendahuluan = \App\Models\Chapter::where('title', 'like', '%pendahuluan%')->first();
        $kegiatanPembelajaran = \App\Models\Chapter::where('title', 'like', '%kegiatan pembelajaran%')->get();

        if ($pendahuluan) {
            $pendahuluan->sections()->createMany([
                ['title' => 'Profil Modul'],
                ['title' => 'Deskripsi singkat materi'],
                ['title' => 'Pemetaan'],
                ['title' => 'Assesmen'],
                ['title' => 'Petunjuk Penggunaan Modul'],
                ['title' => 'Alur Aktivitas'],
            ]);
        }

        foreach ($kegiatanPembelajaran as $chapter) {
            $chapter->sections()->createMany([
                ['title' => 'Tujuan Pembelajaran'],
                ['title' => 'Uraian Materi'],
                ['title' => 'Rangkuman'],
            ]);
        }
    }
}
