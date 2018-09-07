<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \DB;

class AdminController extends Controller
{
    private $page_name;
    
    public function __construct()
    {
        $this->middleware('auth');
        if (!app()->runningInConsole())
        {
            $this->page_name = ucfirst(substr(\Request::route()->getName(), strpos(\Request::route()->getName(), "/") + 1));
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard', ['page_name' => $this->page_name]);
    }

    public function questions()
    {
	    $questions = DB::select("SELECT * FROM questions q ORDER BY id");

        return view('admin.questions', ['page_name'=>$this->page_name, 'questions'=>$questions]);
    }
}
