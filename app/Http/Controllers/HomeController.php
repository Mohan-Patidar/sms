<?php

namespace App\Http\Controllers;
use App\Models\Year;
use Illuminate\Http\Request;
use Session;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $years=Year::get();
        if($years->isEmpty()){
            Session::flash('message', 'First add session with selcting checkbox !!');
            return redirect('years');
        }
        else{
            return redirect('students');
        }
       
        
    }
}
