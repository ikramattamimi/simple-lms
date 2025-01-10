<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        // store if valid
        if (!$request->validated()) {
            return back()->with('status', 'invalid');
        }

        // use uuid for image name
        $imageName = Str::uuid() . '.' . $request->image->extension();
        $request->file('image')->move(public_path('storage/uploads'), $imageName);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        // move image to storage
        // Storage::putFileAs('public/storage/uploads', $request->file('image'), $request->file('image')->getClientOriginalName());

        // redirect to setup page
        return redirect()->route('courses.setup')->with('status', 'course_created');
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
        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        // store if valid
        if (!$request->validated()) {
            return back()->with('status', 'invalid');
        }

        // use uuid for image name
        // $imageName = Str::uuid() . '.' . $request->image->extension();
        // $request->file('image')->move(public_path('storage/uploads'), $imageName);

        // dd($request->description);
        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'body' => $request->body,
            // 'image' => $imageName,
        ]);

        // move image to storage
        // Storage::putFileAs('public/storage/uploads', $request->file('image'), $request->file('image')->getClientOriginalName());

        // redirect to setup page
        return redirect()->route('courses.setup')->with('status', 'course_updated');
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
     * Display the chapters of the course.
     */
    public function chapters(Course $course)
    {
        $chapters = $course->chapters;
        return view('course.chapters', compact('chapters', 'course'));
    }

    /**
     * Setup the course.
     */
    public function setup()
    {
        $courses = Course::all();
        return view('course.setup', compact('courses'));
    }
}
