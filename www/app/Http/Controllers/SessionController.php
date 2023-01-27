<?php

namespace App\Http\Controllers;

use App\Models\Session;
//use App\Models\Patient;
use Illuminate\Http\Request;

class SessionController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::latest()->paginate(5);
    
        return view('sessions.index',compact('sessions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            $request->validate([
                'dentalProcedure' => 'required',
                'complain' => 'required',
                // 'presentDate' => 'required',
                'toothNum' => 'required',
                'payment' => 'required',
            ]);
    
            $input = $request->all();
          //  $input['patient_id'] = sessions()->id;
        
            Session::create($input);
    
            return back()
            ->with('addsuccess', 'New session has been added successfully.');;
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $sessions
     * @return \Illuminate\Http\Response
     */
    public function show(Session $sessions)
    {
        return view('sessions.show',compact('sessions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $sessions
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        return view('sessions.edit',compact('session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $sessions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        $request->validate([
            'dentalProcedure' => 'required',
            'complain' => 'required',
            // 'presentDate' => 'required',
            'toothNum' => 'required',
            'payment' => 'required',
        ]);

    
        $session->update($request->all());
    
        return redirect()->route('patients.show',$session->patient_id)
                        ->with('successs','Session updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $sessions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $sessions)
    {
        $sessions->delete();
    
        return redirect()->route('sessions.index')
                        ->with('success','Product deleted successfully');
    }
}
