<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = Grade::all();
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
            'subject_id' => ['required', 'exists:subjects,id'],
            'grade' => ['required'],
            'mark' => ['required'],
            'claas_id' => ['required', 'exists:classes,id'],
            'exam_id' => ['required', 'exists:exams,id'],
            'full_mark' => ['required'],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        return $grade;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return $grade;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'grade' => ['required'],
            'mark' => ['required'],
            'claas_id' => ['required', 'exists:classes,id'],
            'exam_id' => ['required', 'exists:exams,id'],
            'full_mark' => ['required'],
        ]);
        $grade->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
    }
}
