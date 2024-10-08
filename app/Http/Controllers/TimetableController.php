<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
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
        return view('timetable.index', ['timetables' => $timetable]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = ClassModel::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('timetable.create', ['classes' => $classes, 'subjects' => $subjects, 'teachers' => $teachers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        request()->validate([
            'day_name' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'subject_id' => ['required'],
            'teacher_id' => ['required'],
            'class_id' => ['required'],

        ]);

        // Create a new timetable and save it to the database
        Timetable::create([
            'class_id' => $request->class_id,
            'day_name' => $request->day_name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
        ]);
        return redirect()->back()->with('success', 'Timetable created successfully');
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
    public function edit(Timetable $timetable)
    {
        $timetable = $timetable->load('subject', 'teacher', 'class');
        $classes = ClassModel::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();

        return view('timetable.edit', ['timetable' => $timetable, 'classes' => $classes, 'subjects' => $subjects, 'teachers' => $teachers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Timetable $timetable, Request $request)
    {
        // Validate the request
        request()->validate([
            'day_name' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'subject_id' => ['required'],
            'teacher_id' => ['required'],
            'class_id' => ['required'],

        ]);

        // Create a new timetable and save it to the database
        $timetable->update([
            'class_id' => $request->class_id,
            'day_name' => $request->day_name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return redirect()->back()->with('success', 'Timetable updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timetable $timetable)
    {
        $timetable->delete();
        return redirect()->back()->with('success', 'Timetable deleted successfully');
    }
    public function getTimetableByClassId($classId)
    {
        $timetable = Timetable::where('class_id', $classId)->get();
        $timetable = $timetable->load('subject', 'teacher', 'class');
        return view('timetable.show', ['timetables' => $timetable]);
    }

    public function getTimetableByStudentId(Student $student)
    {
        $student = $student->load('class.timeTable.teacher', 'class.timeTable.subject');
        return view('parent.child-timetable', ['student' => $student]);
    }
}
