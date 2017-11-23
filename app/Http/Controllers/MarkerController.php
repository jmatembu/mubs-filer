<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    public function store(Request $request, $id)
    {
    	$this->validate($request, [
    		'user_id' => 'required|exists:users,id',
    		'quantity' => 'required|numeric'
    	]);

    	$exam = Exam::find($id);

    	$exam->markers()->attach($request->user_id, ['quantity' => $request->quantity]);

    	return back()->with('success', 'Marking information added successfully');
    }
}
