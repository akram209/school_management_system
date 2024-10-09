<?php

namespace App\Http\Controllers;

use App\Jobs\Assignmentjob;
use App\Jobs\ExamJob;
use App\Models\Assignment;
use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignments =  Assignment::all();

        return view('assignment.index', ['assignments' => $assignments]);
    }

    public function createByTeacher(Teacher $teacher)
    {
        $classes = $teacher->classes;
        return view('assignment.create', ['teacher' => $teacher, 'classes' => $classes]);
    }
    public function create()
    {
        $subjects = Subject::all();
        $classes = ClassModel::all();
        return view('assignment.create', ['subjects' => $subjects, 'classes' => $classes]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role == 'teacher') {
            $request->validate([
                'deadline' => ['required', 'date', 'after:today'],
                'time' => ['required'],
                'title' => ['required', 'max:20'],
                'description' => ['required', 'max:150'],
                'mark' => 'required',
                'class_id' => 'required',
                'type' => ['required', 'in:online,offline'],
            ]);
        }
        if (Auth::user()->role == 'admin') {
            $request->validate([
                'deadline' => ['required', 'date', 'after:today'],
                'time' => ['required'],
                'title' => ['required', 'max:20'],
                'description' => ['required', 'max:150'],
                'mark' => 'required',
                'class_id' => 'required',
                'type' => ['required', 'in:online,offline'],
                'subject_id' => ['required'],
            ]);
        }
        $subject_id = $request->subject_id;
        $class_id = $request->class_id;


        if (!$subject_id) {
            $teacher_id = $request->teacher_id;
            $subject_id = DB::table('class_subject_teacher')->where('class_id', $class_id)->where('teacher_id', $teacher_id)->value('subject_id');
        }

        // Combine deadline and time
        $deadline = Carbon::parse($request->deadline . ' ' . $request->time);


        $assignment =  Assignment::create([
            'subject_id' => $subject_id,
            'class_id' => $class_id,
            'title' => $request->title,
            'deadline' => $deadline,
            'description' => $request->description,
            'mark' => $request->mark,
            'type' => $request->type,
        ]);

        dispatch(new Assignmentjob($class_id, $assignment->id));

        return redirect()->back()->with('success', 'Assignment created successfully');
    }
    public function edit(Assignment $assignment)
    {
        $subjects = Subject::all();
        $classes = ClassModel::all();
        return view('assignment.edit', ['assignment' => $assignment, 'subjects' => $subjects, 'classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Assignment $assignment)
    {
        $assignment->load('class', 'subject');

        return view('assignment.show', ['assignment' => $assignment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editByTeacher(Teacher $teacher, Assignment $assignment)
    {

        $classes = $teacher->classes;
        return view('assignment.edit', ['teacher' => $teacher, 'assignment' => $assignment, 'classes' => $classes]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $assignment)
    {
        if (Auth::user()->role == 'teacher') {
            $request->validate([
                'deadline' => ['required', 'date', 'after:today'],
                'time' => ['required'],
                'title' => ['required', 'max:20'],
                'description' => ['required', 'max:80'],
                'mark' => 'required',
                'class_id' => 'required',
                'type' => ['required', 'in:online,offline'],
            ]);
        }
        if (Auth::user()->role == 'admin') {
            $request->validate([
                'deadline' => ['required', 'date', 'after:today'],
                'time' => ['required'],
                'title' => ['required', 'max:20'],
                'description' => ['required', 'max:80'],
                'mark' => 'required',
                'class_id' => 'required',
                'type' => ['required', 'in:online,offline'],
                'subject_id' => ['required'],
            ]);
        }
        $subject_id = $request->subject_id;
        $class_id = $request->class_id;
        if (!$subject_id) {
            $teacher_id = $request->teacher_id;
            $subject_id = DB::table('class_subject_teacher')->where('class_id', $class_id)->where('teacher_id', $teacher_id)->value('subject_id');
        }


        $deadline = Carbon::parse($request->deadline . ' ' . $request->time);

        $assignment->update([
            'subject_id' => $subject_id,
            'class_id' => $class_id,
            'title' => $request->title,
            'deadline' => $deadline,
            'description' => $request->description,
            'mark' => $request->mark,
            'type' => $request->type,
        ]);


        return redirect()->back()->with('success', 'Assignment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {

        $assignment->delete();
        return redirect()->back()->with('success', 'Assignment deleted successfully');
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

        return view('teacher.teacher-assignments', ['teacher' => $teacher, 'assignments' => $assignments,  'upcoming' => $upcoming, 'past' => $past]);
    }
    public function setScore(Assignment $assignment)
    {
        if (Carbon::parse($assignment->deadline)->gte(now())) {
            return redirect()->back()->with('error', 'Assignment deadline has not passed');
        }


        return view('assignment.set-score', ['assignment' => $assignment]);
    }
    public function uploadAssignment(Request $request, Student $student, Assignment $assignment)
    {

        $request->validate([
            'assignmentFile' => ['required', 'mimes:pdf'],
        ]);
        if ($request->hasFile('assignmentFile')) {

            $file = $request->file('assignmentFile');
            $path = Storage::disk('assignments')->put('students', $file);
            $assignment->students()->updateExistingPivot($student->id, ['path' => $path]);
            return redirect()->back()->with('success', 'Assignment ' . $assignment->title . 'Score uploaded successfully');
        } else {

            return redirect()->back()->with('error', 'File not uploaded');
        }
    }
    public function viewAssignment(Student $student, Assignment $assignment)
    {

        $path = $assignment->students()->where('student_id', $student->id)->first()->pivot->path;


        return view('assignment.view', compact('assignment', 'path', 'student'));
    }

    public function deleteAssignment(Student $student, Assignment $assignment)
    {
        Storage::disk('assignments')->delete($assignment->students()->where('student_id', $student->id)->first()->pivot->path);
        $assignment->students()->updateExistingPivot($student->id, ['path' => null]);


        return redirect()->back()->with('success', 'Assignment deleted successfully');
    }
}
