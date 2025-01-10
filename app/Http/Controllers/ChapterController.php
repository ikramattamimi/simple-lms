<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;

class ChapterController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChapterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        return view('chapter.edit', compact('chapter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        if(!$request->validated())
        {
            return back()->with('status', 'invalid');
        }

        $chapter->update($request->validated());
        // return redirect()->route('chapters.setup')->with('status', 'updated');
        return back()->with('status', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        //
    }

    /**
     * Show the form for setting up chapters.
     */
    public function setup()
    {
        $chapters = Chapter::all();
        return view('chapter.setup', compact('chapters'));
    }

    /**
     * Show chapter for student
     */
    public function chapter(Chapter $chapter)
    {
        return view('chapter.student.show', compact('chapter'));
    }

    /**
     * Activates the chapter.
     *
     * This function sets the chapter's `is_active` attribute to true.
     *
     * @param Chapter $chapter
     * @return void
     */
    public function activate(Chapter $chapter)
    {
        $chapter->is_active = true;
        $chapter->save();
        return back()->with('status', 'success');
    }

    /**
     * Deactivates the chapter.
     *
     * This function sets the chapter's `is_active` attribute to false.
     *
     * @param Chapter $chapter
     * @return void
     */
    public function deactivate(Chapter $chapter)
    {
        $chapter->is_active = false;
        $chapter->save();
        return back()->with('status', 'success');
    }
}
