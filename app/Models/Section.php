<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Section extends Model
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'title',
        'body',
        'chapter_id',
        'sequence',
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

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_section')
                    ->withPivot('is_completed', 'completion_date');
    }
}
