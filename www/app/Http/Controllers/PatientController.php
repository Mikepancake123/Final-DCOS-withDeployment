<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SessionController;
use App\Models\Patient;
use App\Models\Session;
use Illuminate\Http\Request;

class PatientController extends Controller
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

    // Search

    public function search(Request $request)
    {
        $search = $request->input('search');
        $patients = Patient::query()
        ->where('fullName', 'LIKE', "%{$search}%")
        ->orWhere('contactNum', 'LIKE', "%{$search}%")
        ->orWhere('address', 'LIKE', "%{$search}%")
        ->orWhere('dateOfBirth', 'LIKE', "%{$search}%")
        ->get();
        return view('patients.search', compact('patients'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ascending
        // $patients = Patients::orderBy('id', 'desc')->get();
        $patients = Patient::latest()->paginate(100);

        $totalpatients = Patient::count();

        return view('patients.index', compact('patients'))
        ->with('totalpatients', $totalpatients)
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
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
            'fullName' => 'required',
            'contactNum' => 'required',
            'address' => 'required',
            'dateOfBirth' => 'required',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients')
            ->with('success', 'A patient has been added successfully.');
    }

 
    // public function show(Patient $patient)
    // {
    //    // $sessions = Session::with('patients')->get();
    //    // $sessions = Patient::find()->sessions;
    //    // $comments = Post::find(1)->comments;
    //   //  $sessions = Patient::where('patient_id', $patient->id)->get();
    //     $sessions = Patient::find(1)->sessions()->where('patient_id', 'id')->first();
    //    // $patient = Patients::with('sessions')->get();
    //     return view('patients.show',compact('patient');
        
    // } 

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        $sessions = Session::whereBelongsTo($patient)->get();
        return view('patients.show', compact('patient', 'sessions'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patients
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'fullName' => 'required',
            'contactNum' => 'required',
            'address' => 'required',
            'dateOfBirth' => 'required',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.show',$patient->id)
        // return back()
             ->with('success', 'Patients information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Patients deleted successfully');
    }


}
