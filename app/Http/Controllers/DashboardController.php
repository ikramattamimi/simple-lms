<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all courses from the database
        $courses = Course::all();

        // Get courses that belong to the authenticated user
        $enrolledCourses = auth()->user()->courses;

        // Pass the courses to the view
        if (auth()->user()->isAdmin()) {
            return view('dashboard.admin', compact('courses', 'enrolledCourses'));
        } else {
            return view('dashboard', compact('courses', 'enrolledCourses'));
        }
    }
}
