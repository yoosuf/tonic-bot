<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }


    public function index($question_id)
    {
    	$answers = Answer::where('status', true)->where('question_id', $question_id);
    	
    	$data = $answers->paginate(request()->has('limit') ? request()->get('limit') : 10 );
    	
    	return $data;
    }


    public function show($question_id, $answer_id)
    {
		$data = Answer::where('status', true)->where('question_id', $question_id)->where('id', $answer_id)->first();

		if (count($data) < 1) {
			return "No Record found";
		}

		return $data;
    }

    public function store()
    {
    	$user = auth()->user();

    	$data = [
    		'content' => request()->get('content')
    	];

		$user->questions()->answers()->create($data);

		return "Data was created";
    }
}
