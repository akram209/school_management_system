<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function createByTeacher(Teacher $teacher)
    {
        $classes = $teacher->classes;
        return view('assignment.create', ['teacher' => $teacher, 'classes' => $classes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $class_id = $request->class_id;
        if (!$request->subject_id) {
            $teacher_id = $request->teacher_id;
            $subject_id = DB::table('class_subject_teacher')->where('class_id', $class_id)->where('teacher_id', $teacher_id)->value('subject_id');
        }
        $time = $request->time;
        $deadline = Carbon::parse($request->deadline . ' ' . $time)->format('Y-m-d H:i:s');


        Assignment::create([
            'subject_id' => $subject_id,
            'class_id' => $class_id,
            'title' => $request->title,
            'deadline' => $deadline,
            'description' => $request->description,
            'mark' => $request->mark,
        ]);
        return redirect()->back()->with('success', 'Assignment created successfully');
    }

    /**
     * Store a newly created resource in storage.
     */


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
        $studentScore = [];
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
    public function getAssignmentsByTeacherId(Teacher $teacher)
    {
        //join assignments table with class_subject_teacher table

        $assignments = Assignment::join('class_subject_teacher', function ($join) use ($teacher) {
            $join->on('assignments.class_id', '=', 'class_subject_teacher.class_id')
                ->on('assignments.subject_id', '=', 'class_subject_teacher.subject_id')
                ->where('class_subject_teacher.teacher_id', '=', $teacher->id);
        })
            ->select('assignments.*')
            ->distinct()
            ->get();
        //load subject data;
        $assignments =  $assignments->load('subject');
        $upcoming = 0;
        $past = 0;
        foreach ($assignments as $key => $assignment) {
            if (Carbon::parse($assignment->deadline)->gte(now())) {
                $upcoming = 1;
            }
            if (Carbon::parse($assignment->deadline)->lt(now())) {
                $past = 1;
            }
        }

        return view('teacher.teacher-assignments', ['assignments' => $assignments,  'upcoming' => $upcoming, 'past' => $past]);
    }
}
