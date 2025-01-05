<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    /**
     * The assignments that belong to the course.
     */
    public function assignments()
    {
        return $this->belongsToMany(Assignment::class, 'user_assignment')
                    ->withPivot('filename', 'body', 'submitted_at', 'grade');
    }

    /**
     * The sections that belong to the course.
     */
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'user_section')
                    ->withPivot('is_completed', 'completion_date');
    }

    /**
     * The users that belong to the course.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course')
                    ->withPivot('is_active');
    }
}
