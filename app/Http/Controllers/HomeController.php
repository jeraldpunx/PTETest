<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Cache;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function index2()
    {
        return view('index');
    }

    public function previous_page(Request $request)
    {
        $results    = Session::get('results');
        $page_num   = app('request')->input('page_num');

        unset($results[$page_num - 1]);
        Session::set("results", $results);
        Session::save();
            
        return redirect()->route('reading', ['page_num' => $page_num]);
    }

    public function result(Request $request)
    {
        $results = Session::get('results');
        $correct_answer = 0;

        foreach ($results as $result) {
            if( in_array($result['blade_type'], ["single_answer", "dropdown_fill_in_the_blank", "multiple_answer"]) ) {
                if(empty(Differences($result['correct_answer'], $result['answer'])))
                    $correct_answer++;
            } else {
                if($result['correct_answer'] == $result['answer'])
                    $correct_answer++;
            }
        }

        $all_results = [
            "total_questions" => count($results),
            "correct_answer" => $correct_answer
        ];

        return view('result')->with(compact('all_results'));
    }

    public function post_answer(Request $request)
    {
        $questions  = Cache::get('questions');
        $results    = Session::get('results');

        Session::push("results", $request->all());
        Session::save();

            if(app('request')->input('page_num') == count($questions) + 1)
                return redirect()->route('result');
            
        return redirect()->route('reading', ['page_num' => app('request')->input('page_num')]);
    }

    public function reading()
    {
        $results = Session::get('results');


        $page_num = 1;
        if(app('request')->input('page_num') != null)
            $page_num = app('request')->input('page_num');
        else {
            Cache::forget('questions');
            Session::forget('results');
            Session::save();
        }

        $questions = Cache::rememberForever('questions', function() {
            $questions = DB::select("SELECT * FROM questions q ORDER BY RANDOM()");

            foreach ($questions as $question) {
                if($question->type == "dropdown_fill_in_the_blank") {
                    $choices = DB::select("SELECT * FROM choices WHERE question_id = '". $question->id . "' ORDER BY choice_order ASC");
                    $new_choices = [];
                    foreach($choices as $choice) {
                        $new_choices[$choice->choice_order][$choice->id] = $choice->given;              
                    }

                    $choices = $new_choices;
                } else if($question->type == "reorder_answer") {
                    $choices = DB::select("SELECT * FROM choices WHERE question_id = '". $question->id . "' ORDER BY RANDOM()");
                } else {
                    $choices = DB::select("SELECT * FROM choices WHERE question_id = '". $question->id ."'");
                }
                
                $question->choices = $choices;
            }

            return $questions;
        });

        return view('reading/' . $questions[$page_num-1]->type)
                                    ->with('questions', $questions)
                                    ->with('page_num', $page_num);
    }
}
