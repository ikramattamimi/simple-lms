<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Chapter;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chapters = Chapter::all();
        return view('section.create', compact('chapters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
        // dd($request->all());
        if (!$request->validated()) {
            return back()->with('status', 'invalid');
        }

        $section = Section::create($request->validated());
        return redirect()->route('sections.setup')->with('status', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        $chapters = Chapter::all();
        return view('section.edit', compact('section', 'chapters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {
        if (!$request->validated()) {
            return back()->with('status', 'invalid');
        }

        $section->update($request->validated());
        // return back()->with('status', 'success');
        return redirect()->route('sections.setup')->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        // dd($section);
        $section->delete();
        return redirect()->route('sections.setup')->with('status', 'deleted');
    }

    /**
     * Show the table for setting up the sections.
     */
    public function setup()
    {
        $sections = Section::all();
        return view('section.setup', compact('sections'));
    }

    /**
     * Show section for student.
     */
    public function section(Section $section)
    {
        // Get the chapter associated with the section
        $chapter = $section->chapter;

        // Get the course title from the chapter
        $courseTitle = $chapter->course->title;

        // Get the opening chapters that have no sections and are active
        $openingChapters = $chapter->course->chapters->filter(function ($ch) {
            return $ch->sections->isEmpty() && $ch->is_active;
        });

        // Get the main chapters that have sections and are active
        $mainChapters = $chapter->course->chapters->filter(function ($ch) {
            return !$ch->sections->isEmpty() && $ch->is_active;
        });

        // Filter and sort the sections of each main chapter by sequence
        $mainChapters = $mainChapters->map(function ($ch) {
            $ch->sections = $ch->sections->filter(function ($section) {
                return $section->is_active;
            })->sortBy('sequence');
            return $ch;
        });

        return view('section.student.show', compact('section', 'courseTitle', 'openingChapters', 'mainChapters'));
    }

    /**
     * Activate the specified section.
     */
    public function activate(Section $section)
    {
        $section->is_active = true;
        $section->save();
        return back()->with('status', 'activated');
    }

    /**
     * Deactivate the specified section.
     */
    public function deactivate(Section $section)
    {
        $section->is_active = false;
        $section->save();
        return back()->with('status', 'deactivated');
    }
}
