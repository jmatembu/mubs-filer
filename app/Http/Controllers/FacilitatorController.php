<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class FacilitatorController extends Controller
{
    

    public function store(Request $request, $id)
    {
    	$this->validate($request, [
    		'user_id' => 'required|exists:users,id',
    		'academic_year' => 'required',
    		'semester' => 'required|max:1',
    		'team_leader' => 'required|max:1'
    	]);

    	$pivotData = $request->only('academic_year', 'semester', 'team_leader');

    	$course = Course::find($id);
    	$course->facilitators()->attach($request->user_id, $pivotData);

    	return back()->with('success', 'Facilitator assigned successfully');
    }
}
