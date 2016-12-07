<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }


    public function index()
    {
    	$questions = Question::where('status', true);
    	
    	$data = $questions->paginate(request()->has('limit') ? request()->get('limit') : 10 );
    	
    	return $data;
    }


    public function show($id)
    {

		$data = Question::where('status', true)->where('id', $id)->first();

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

		$user->questions()->create($data);

		return "Data was created";
    }
}
