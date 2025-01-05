<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
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
    public function store(StoreCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    /**
     * Enroll the authenticated user in the course.
     */
    public function enroll(Course $course)
    {

        // check if user enrolled
        if (auth()->user()->courses->contains($course)) {
            return back()->with('status', 'already_enrolled');
        }

        auth()->user()->courses()->attach($course);
        return back()->with('status', 'enrolled');
    }

    /**
     * Display the sections of the course.
     */
    public function sections(Course $course)
    {
        $sections = $course->sections;
        $courseTitle = $course->title;
        return view('course.sections', compact('sections', 'courseTitle'));
    }
}
