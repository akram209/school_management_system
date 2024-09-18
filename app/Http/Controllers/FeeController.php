<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = Fee::all();
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
            'status' => ['required', 'in:paid,unpaid'],
        ]);
        Fee::create([
            'student_id' => $request->student_id,
            'status' => $request->status,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Fee $fee)
    {
        return $fee;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fee $fee)
    {
        return $fee;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fee $fee)
    {
        $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'status' => ['required', 'in:paid,unpaid'],
        ]);
        $fee->update([
            'student_id' => $request->student_id,
            'status' => $request->status,
        ]);
        $fee->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fee $fee)
    {
        $fee->delete();
    }
    public function getFeeByStudentId($studentId)
    {
        $fee = Fee::where('student_id', $studentId)->get();
        return $fee;
    }
}
