<?php

namespace App\View\Components;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;

class SidebarStudent extends Component
{
    public $course, $courseTitle, $openingChapters, $mainChapters, $slug;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {

        // Delete the previous forever cache
        // Cache::forget('sidebar_menu');
        // Cache::forget('course_title');
        // Cache::forget('opening_chapters');
        // Cache::forget('main_chapters');

        $this->course = Cache::remember('sidebar_menu', 30 * 60, function () {
            return Course::where('title', 'like', '%ecofarming%')->first();
        });

        $this->courseTitle = Cache::remember('course_title', 30 * 60, function () {
            return $this->course->title;
        });

        $this->openingChapters = Cache::remember('opening_chapters', 30 * 60, function () {
            return $this->course->chapters->filter(function ($ch) {
                return $ch->sections->isEmpty();
            });
        });

        $this->mainChapters = Cache::remember('main_chapters', 30 * 60, function () {
            return $this->course->chapters->filter(function ($ch) {
                return !$ch->sections->isEmpty() && $ch->is_active;
            })->map(function ($ch) {
                $ch->sections = $ch->sections->filter(function ($sec) {
                    return $sec->is_active;
                })->sortBy('sequence');
                return $ch;
            });
        });

        $this->slug = Route::current()->parameter('chapter')['slug'] ?? Route::current()->parameter('section')['slug'] ?? 'slug';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-student');
    }
}
