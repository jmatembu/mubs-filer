<?php

namespace App\Http\Controllers;

use DB;
use App\Exam;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;

class ExamController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('exams.index');
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
        $chart = Charts::multi('areaspline', 'highcharts')
            ->title('Performance Analsyis')
            ->colors(['#ff0000', '#18a689'])
            ->labels(['0 - 49', '50 - 54', '55 - 59', '60 - 64', '65 - 69','70 - 74', '75 - 79', '80 - 100'])
            ->dataset('CW', [30, 40, 40, 35, 25, 17, 23, 9])
            ->dataset('FEM',  [5, 30, 40, 30, 35, 20, 35, 19]);

        $facilitatorList = DB::table('users')
            ->select(DB::raw('concat(first_name, " ", last_name) AS name, id'))
            ->where('department_id', $exam->course->program->department_id)
            ->orderBy('name')
            ->pluck('name', 'id');

        $fileCategoryList = [
            'Test 1 Marking Guide' => 'Test 1 Marking Guide',
            'Test 2 Marking Guide' => 'Test 2 Marking Guide',
            'Exam Marking Guide' => 'Exam Marking Guide',
            'Test 1 Question Paper' => 'Test 1 Question Paper',
            'Test 2 Question Paper' => 'Test 2 Question Paper',
            'Exam Question Paper' => 'Exam Question Paper',
            'Test 1 Results' => 'Test 1 Results',
            'Test 2 Results' => 'Test 2 Results',
            'Exam Results' => 'Exam Results'
        ];

        return view('exams.show', compact('exam', 'facilitatorList', 'fileCategoryList', 'chart'));
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
        
        // TODO: Check if a file for the same category exists
        $file = $exam->addMediaFromRequest('exam_file')
            ->withCustomProperties([
                'file_category' => $request->file_category,
                'status' => 'Pending',
                'appoved_at' => '',
                'approved_by' => '',
                'checked_at' => '',
                'checked_by' => '',
                'uploaded_by' => $request->user()->fullName()
            ])
            ->toMediaCollection();
        
        $fileCategory = str_slug($request->file_category);
        
        $message = 'File uploaded successfully.';

        if (str_contains($fileCategory, 'results')) {
            
            $this->extract($file->getPath());

            $sheet = $request->session()->get('sheet');

            $results = $exam->performance_analysis;
            $results[$fileCategory] = $sheet;
            
            $exam->performance_analysis = $results;
            $exam->save();

            $message = 'File uploaded, and performance data exracted successfully.';
        }
        
        return back()->with('success', $message);
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
    
    /*
     * Extract data from excel file
     * 
     * @parem $file File
     * @return Array
     */
    private function extract($file) {
        $excel = app()->make('excel');
        
        $excel->load($file, function ($reader) {
            
            $sheet = $reader->first(); 

            $sheet = $sheet->filter(function($row) {
                return ! is_null($row->name);
            })
            ->each(function($row, $key) {
                $row->forget(['no.', 0]);
            })
            ->toArray();

            session(['sheet' => $sheet]);
        });

    }
}
