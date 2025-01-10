<?php

namespace App\Console\Commands;

use App\Models\Course;
use App\Models\Section;
use App\Models\Chapter;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class GenerateSlugsCommand extends Command
{
    protected $signature = 'slugs:generate-all {--model=all}';
    protected $description = 'Generate slugs for courses, sections, and chapters';

    protected $models = [
        'courses' => Course::class,
        'sections' => Section::class,
        'chapters' => Chapter::class
    ];

    public function handle()
    {
        $modelOption = $this->option('model');

        if ($modelOption === 'all') {
            foreach ($this->models as $name => $modelClass) {
                $this->generateSlugsForModel($modelClass, $name);
            }
        } elseif (array_key_exists($modelOption, $this->models)) {
            $this->generateSlugsForModel($this->models[$modelOption], $modelOption);
        } else {
            $this->error("Model tidak valid! Gunakan: courses, sections, chapters, atau all");
            return 1;
        }

        $this->info('Proses generate slug selesai!');
    }

    protected function generateSlugsForModel($modelClass, $name)
    {
        $this->info("\nMemproses {$name}...");

        $records = $modelClass::whereNull('slug')
            ->orWhere('slug', '')
            ->get();

        $bar = $this->output->createProgressBar(count($records));
        $bar->start();

        $count = 0;
        foreach ($records as $record) {
            // Ambil title atau nama field yang sesuai
            $sourceField = $this->getSourceField($record);
            $slug = Str::slug($record->$sourceField);

            // Cek slug unik
            $i = 1;
            $originalSlug = $slug;
            while ($modelClass::where('slug', $slug)
                ->where('id', '!=', $record->id)
                ->exists()) {
                $slug = $originalSlug . '-' . $i;
                $i++;
            }

            $record->slug = $slug;
            $record->save();

            $count++;
            $bar->advance();
        }

        $bar->finish();
        $this->info("\nBerhasil generate {$count} slugs untuk {$name}!");
    }

    protected function getSourceField(Model $model): string
    {
        // Sesuaikan dengan nama field yang ingin dijadikan sumber slug
        $fieldMap = [
            Course::class => 'title',    // Jika di tabel courses menggunakan field 'name'
            Section::class => 'title',   // Jika di tabel sections menggunakan field 'title'
            Chapter::class => 'title'    // Jika di tabel chapters menggunakan field 'title'
        ];

        return $fieldMap[get_class($model)] ?? 'title';
    }
}
