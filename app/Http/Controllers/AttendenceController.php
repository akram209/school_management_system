<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Attendence;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $index =Attendence::all();
       return $index;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'date' => ['required'],
            'status' => ['required', 'in:present,absent'],
        ]);
        Attendence::create([
            'student_id' => $request->student_id,
            'date' => $request->date,
            'status' => $request->status,
        ]);
         
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendence $attendence)
    {
        return $attendence;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendence $attendence)
    {
        return $attendence;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Attedence $attendence)
    { 
        $request->validate([
        'student_id' => ['required', 'exists:students,id'],
        'date' => ['required'],
        'status' => ['required', 'in:present,absent'],
    ]);
        Attendence::update([
        'student_id' => $request->student_id,
        'date' => $request->date,
        'status' => $request->status,
    ]);
        $attendence->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendence $attendence)
    {
        $attendence->delete();
    }
    
}
