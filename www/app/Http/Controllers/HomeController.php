<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

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
        return view('patients');
    }

    public function report(Request $request)
     {
     $fromdate = $request->fromdate;
     $todate = $request->todate;
    $today = $request->today;

     //\DB::statement("SET SQL_MODE=''");
  
     $sessions = Session::select()->whereBetween('created_at', [$request->fromdate." 00:00:00", $request->todate." 23:59:59"])->get();
    
    //  $sessions = Session::select()->whereBetween('created_at', [$request->fromdate." 00:00:00", $request->todate." 23:59:59"])->orWhereDate('created_at',$request->today)->get();
    
    //  $sessions = Session::whereDate('created_at', now())
    //  ->groupBy('created_at')
    //  ->get();
    
        $sum = $sessions->sum('payment');  

        return view('reports.index',compact('sessions'))
        ->with('sum',$sum);
        // ->with('i', (request()->input('page', 1) - 1) * 5);    
    }

}

