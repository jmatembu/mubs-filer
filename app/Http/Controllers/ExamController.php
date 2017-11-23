<?php

namespace App\Http\Controllers;

use DB;
use App\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
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
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        $facilitatorList = DB::table('users')
                            ->select(DB::raw('concat(first_name, " ", last_name) AS name, id'))
                            ->where('department_id', $exam->course->program->department_id)
                            ->orderBy('name')
                            ->pluck('name', 'id');

        $fileCategoryList = [
            'Marking Guide' => 'Marking Guide',
            'Results' => 'Results',
            'Question Paper' => 'Question Paper'
        ];

        return view('exams.show', compact('exam', 'facilitatorList', 'fileCategoryList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }

    public function upload(Request $request, Exam $exam)
    {
        $this->validate($request, [
            'file_category' => 'required',
            'exam_file' => 'required|file'
        ]);

        $exam->addMediaFromRequest('exam_file')
            ->withCustomProperties([
                'file_category' => $request->file_category,
                'status' => 'Pending',
                'appoved_at' => '',
                'approved_by' => '',
                'checked_at' => '',
                'checked_by' => ''
            ])
            ->toMediaCollection();

        return back()->with('success', 'File uploaded successfully');
    }

    public function removeMedia(Exam $exam, $mediaId)
    {
        $exam->deleteMedia($mediaId);

        return back()->with('success', 'File deleted successfully');
    }

    public function download(Request $request)
    {
        $this->validate($request, ['file_path' => 'required']);

        return response()->download($request->file_path);
    }
}
