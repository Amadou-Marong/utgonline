<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "Hello World";
        //
        // $courses = Course::orderBy('created_at', 'desc')->get();
        // return Inertia::render('Courses/Index', compact('courses'));
        return Inertia::render('Admin/Courses/Index', [
            'courses' => Course::paginate()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Courses/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'name' => 'required',
        ]);
        $course = new Course();
        $course->name = $request->name;
        $course->save();

        return to_route('admin.courses.index');
        //return redirect()->route('courses');

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $course = Course::find($id);
        return Inertia::render('Admin/Courses/Edit', [
            'course' => $course
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $course = Course::find($id);
        $course->name = trim($request->name);
        $course->save();
        sleep(1);

        return redirect()->route('admin.courses.index')->with('message', 'Course Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Request $request)
    public function destroy($id)
    {
        // $course = $request->course();
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('admin.courses.index');
    }
}
