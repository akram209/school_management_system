<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getAssignmentsByStudentId(Student $student)
    {

        $assignments = Assignment::with('students')->where('class_id', $student->class_id)->get();
        $upcoming = 0;
        $past = 0;
        foreach ($assignments as $key => $assignment) {
            $studentScore[$key] = $assignment->students->where('id', $student->id)->first();
            if (Carbon::parse($assignment->deadline)->gte(now())) {
                $upcoming = 1;
            }
            if (Carbon::parse($assignment->deadline)->lt(now())) {
                $past = 1;
            }
        }

        return view('student.student-assignments', ['assignments' => $assignments, 'student' => $studentScore, 'upcoming' => $upcoming, 'past' => $past]);
    }
}
