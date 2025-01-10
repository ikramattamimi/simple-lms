<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Chapter extends Model
{
    /** @use HasFactory<\Database\Factories\ChapterFactory> */
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'title',
        'description',
        'is_active',
        'slug'
    ];

    // Automatically generate UUID for the primary key
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Automatically generate UUID for the primary key
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }

            // Generate Slug
            $model->slug = Str::slug($model->title);

            // Memastikan slug unik
            $count = 1;
            while (static::where('slug', $model->slug)->exists()) {
                $model->slug = Str::slug($model->title) . '-' . $count;
                $count++;
            }
        });
    }

    /**
     * Get the course that owns the chapter.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * The sections that belong to the chapter.
     */
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
