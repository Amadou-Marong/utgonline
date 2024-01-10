<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Course;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ExamController extends Controller
{
    public  function index(){
        
        $courses = Course::paginate();
        
        $exams = Exam::with('courses')->get();
        return Inertia::render('Admin/Exams/Index', [
            'courses' => $courses,
            'exams' => Exam::paginate()
        ]);

        // return Inertia::render('Exams/Index');



        // $exams = Exam::select('exams.id', 'exams.name', 'course_id', 'date', 'time',
        // 'courses.name as course')
        // ->join('courses', 'courses.id', '=', 'exams.courses_id')
        // ->paginate(10);

        // $courses = Course::all();
        // return Inertia::render('Admin/Exams/Index', [
        //     'exams' => $exams,
        //     'courses' => $courses
        // ]);

    }



    


    public function create()
    {
        // $courses = Course::all();
        // return Inertia::render('Admin/Exams/Create');

        // $exams = Exam::select('exams.id', 'exams.name', 'course_id', 'date', 'time',
        // 'course.name as course')
        // ->join('courses', 'course.id', '=', 'exams.course_id');
        // ->paginate();

        $courses = Course::paginate();
        return Inertia::render('Admin/Exams/Create',[
            'courses' => $courses
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // dd($request->all());

        $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'course_id' => 'required',
            'time' => 'required|date_format:H:i',
        ]);
        $exam = new Exam();
        $exam->name = trim($request->name);
        $exam->course_id = $request->course_id;
        $exam->date = $request->date;
        $exam->time = $request->time;
        $exam->duration = $request->duration;
        $exam->save();

        return to_route('admin.exams.index');
        //return redirect()->route('courses');

    }





    // public function create(){
    //     // return Inertia::render('Exams/Create');
    //     return Inertia::render('Exams/Create');
    // }

    // public function store(Request $request){
    //     $can = $request->user()->can('create exams');
    //     if(!$can){
    //         return redirect()->route('exams.index');
    //     }else{
    //         $request()->validate([
    //             'name' => 'required|string',
    //             'date' => 'required|date',
    //             'time' => 'required|date_format:H:i',
    //         ]);
    //         Exam::create($request->all())->save();
    //         return redirect()->route('exams.index');
    //     }    
    // }  
    
    // public function show(Exam $exam)
    // {
    //     return Inertia::render('Exams/Show', [
    //         'exam' => $exam
    //     ]);
    // }

    public function edit($id)
    {
        // $can = $request->user()->can('update exams');

        $exams = Exam::paginate();
        $courses = Course::find($id);
        return Inertia::render('Admin/Exams/Edit', [
            'courses' => $courses,
            'exams' => $exams
        ]);
    }


    public function update(Request $request, $id)
    {
        // $can = $request->user()->can('update exams');
        // if(!$can){
        //     return to_route('admin.exams.index');
        // }else{
        //     $request()->validate([
        //         'name' => 'required|string',
        //         'date' => 'required|date',
        //         'time' => 'required|date_format:H:i',
        //     ]);
        //     $exam->update($request->all());
        //     return redirect()->route('admin.exams.index');
        // }

        $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'course_id' => 'required',
            'time' => 'required|date_format:H:i',
        ]);
        
        $exam = Exam::find($id);
        $exam->name = trim($request->name);
        $exam->course_id = $request->course_id;
        $exam->date = $request->date;
        $exam->time = $request->time;
        $exam->save();
        sleep(1);
        // redirect to the index
        return redirect()->route('admin.exams.index')->with('message', 'Exam Updated Successfully');

    }

    public function destroy(Request $request, $id)
    {
       
        $candelete = Permission::where('name', 'delete exams')->first();
        // $hasRole = Role::where('name', 'user')->first();

        $can = $request->user()->can($candelete);
        // dd($hasRole);

        // $can = $request->user()->can('delete courses');
        if($can == true){
            $exam = Exam::find($id);
            $exam->delete();
            return redirect()->route('admin.exams.index');
        }else{
            return redirect()->route('admin.exams.index')->with('message', 'You are not allowed to delete this exam');
        }    
    }
    // public function destroy($id)
    // {
    //     $exam = Exam::find($id);
    //     $exam->delete();
    //     return redirect()->route('admin.exams.index');    
    // }
}
