<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \DB;

use App\Question;
use App\Choice;

class QuestionController extends Controller
{
    private $page_name;
	
	public function __construct()
    {
        $this->middleware('auth');
        if (!app()->runningInConsole())
		{
		    $this->page_name = ucfirst(substr(\Request::route()->getName(), strpos(\Request::route()->getName(), ".") + 1));
		}
    }

	public function index(Request $request)
	{
		// $questions = DB::select("SELECT * FROM questions q ORDER BY id");

		$questions = Question::orderBy('id')->get();


        return view('admin.questions.index', ['page_name' => $this->page_name, 'questions' => $questions])->with('i', 0);

		// $products= Product::orderBy('id','DESC')->paginate(5);
		// return view('admin.questions.index', compact('products'))
		// ->with('i', ($request->input('page', 1) - 1) * 5);
	}

	public function create()
	{
		// if($name_view)
			// return view('admin.questions.' . $name_view, ['page_name' => $this->page_name]);
		// else
			return view('admin.questions.create', ['page_name' => $this->page_name]);
	}

	public function create_partials(Request $request)
	{
		return view('admin.questions.partial.' . $request->type)->render();
	}

	public function store(Request $request)
	{
		return $request->options;
		$this->validate($request, [
			'type' 				=> 'required',
			'question' 			=> 'required',
			'options' 			=> 'required',
			'answer' 			=> 'required'
		], ['answer.required' 	=> 'Add option / select the correct answer.']);

		// $question = new Question;
		// $question->question = $request->question;
		// $question->type 	= $request->type;
		// $question->save();
		// $question->options 	= $request->options;
		// $question->answer 	= $request->answer;

		$answer = [];
		foreach (is_array($request->options) ? $request->options : explode(",", $request->options) as $option) 
		{
			// $option;
			// $choice 				= new Choice;
			// $choice->given 			= $option;
			// $choice->question_id 	= $question->id;
			// $choice->save();

			// if($request->type == "reorder_answer") {
			// 	array_push($answer, $choice->id);
			// } else {
			// 	if(in_array($option, is_array($request->answer) ? $request->answer : [$request->answer]))
					array_push($answer, $option);
			
					// array_push($answer, $choice->id);
			// }
		}

		dd($answer);

		
		// $question->answer = implode(",", $answer);
		// $question->save();

		// return redirect()->route('admin.questions.index')
		// 	->with('success','Question created successfully');
	}

	// 	/**
	// 	 * Display the specified resource.
	// 	 *
	// 	 * @param  int  $id
	// 	 * @return \Illuminate\Http\Response
	// 	 */
	// 	public function show($id)
	// 	{
	// 		$product= Product::find($id);
	// 		return view('ProductCRUD.show',compact('product'));
	// 	}
	// 	/**
	// 	 * Show the form for editing the specified resource.
	// 	 *
	// 	 * @param  int  $id
	// 	 * @return \Illuminate\Http\Response
	// 	 */
	// 	public function edit($id)
	// 	{
	// 		$product= Product::find($id);
	// 		return view('ProductCRUD.edit',compact('product'));
	// 	}
	// 	/**
	// 	 * Update the specified resource in storage.
	// 	 *
	// 	 * @param  \Illuminate\Http\Request  $request
	// 	 * @param  int  $id
	// 	 * @return \Illuminate\Http\Response
	// 	 */
	// 	public function update(Request $request, $id)
	// 	{
	// 		$this->validate($request, [
	// 			'name' => 'required',
	// 			'details' => 'required',
	// 		]);
	// 		Product::find($id)->update($request->all());
	// 		return redirect()->route('productCRUD.index')
	// 		->with('success','Product updated successfully');
	// 	}
	// 	/**
	// 	 * Remove the specified resource from storage.
	// 	 *
	// 	 * @param  int  $id
	// 	 * @return \Illuminate\Http\Response
	// 	 */
	// 	public function destroy($id)
	// 	{
	// 		Product::find($id)->delete();
	// 		return redirect()->route('productCRUD.index')
	// 		->with('success','Product deleted successfully');
	// 	}
	}