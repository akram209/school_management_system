<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timetable =  Timetable::all();
        return $timetable;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Timetable $timetable)
    {
        // Validate the request
        request()->validate([
            'day_name' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'subject_id' => ['required'],
            'teacher_id' => ['required'],
            'class_id' => ['required'],
            'date' => ['required']

        ]);

        // Create a new timetable and save it to the database
        $timetable = Timetable::create([
            'day_name' => request('day_name'),
            'start_time' => request('start_time'),
            'end_time' => request('end_time'),
            'subject_id' => request('subject_id'),
            'teacher_id' => request('teacher_id'),
            'class_id' => request('class_id'),
            'date' => request('date'),
        ]);

        return $timetable;
    }

    /**
     * Display the specified resource.
     */
    public function show(Timetable $timetable)
    {
        return $timetable;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Timetable $timetable)
    {
        // Validate the request
        request()->validate([
            'day_name' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'subject_id' => ['required'],
            'teacher_id' => ['required'],
            'class_id' => ['required'],
            'date' => ['required']

        ]);

        // Create a new timetable and save it to the database
        $timetable->update([
            'day_name' => request('day_name'),
            'start_time' => request('start_time'),
            'end_time' => request('end_time'),
            'subject_id' => request('subject_id'),
            'teacher_id' => request('teacher_id'),
            'class_id' => request('class_id'),
            'date' => request('date'),
        ]);

        return $timetable;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timetable $timetable)
    {
        $timetable->delete();
    }
    public function getTimetableByClassId($classId)
    {
        $timetable = Timetable::where('class_id', $classId)->get();
        dd($timetable);
    }
    // public function getTimetableByTeacherId($classId)
    // {
    //     $timetable = Timetable::where('teacher_id', $classId)->get();
    //     dd($timetable);
    // }
    public function getTimetableByStudentId(Student $student)
    {
        $student = $student->load('class.timeTable.teacher', 'class.timeTable.subject');
        return view('parent.child-timetable', ['student' => $student]);
    }
}
