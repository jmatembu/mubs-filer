<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource for course in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeExam(Request $request, $id)
    {
        $this->validate($request, [
            'academic_year' => 'required|min:8|max:10',
            'semester' => 'required|max:1',
            'exam_schedule' => 'required|max:50',
            'exam_type' => 'required|max:50'
        ]);

        $exam = $request->only('academic_year', 'semester', 'exam_type');
        $exam['examiner'] = $request->user()->id;
        $examSchedule = Carbon::parse($request->exam_schedule)->toDateTimeString();
        $exam['exam_schedule'] = $examSchedule;

        $course = Course::find($id);

        $course->exams()->create($exam);

        return back()->with('success', 'Exam added succussfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $facilitatorList = DB::table('users')
                            ->select(DB::raw('concat(first_name, " ", last_name) AS name, id'))
                            ->where('department_id', $course->program->department_id)
                            ->orderBy('name')
                            ->pluck('name', 'id');

        $academicYearList = ['2017/2018' => '2017/2018'];

        return view('courses.show', compact('course', 'facilitatorList', 'academicYearList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
