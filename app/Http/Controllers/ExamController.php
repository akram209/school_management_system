<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;
use Database\Seeders\ExamSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = Exam::all();
        return $index;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createByTeacher(Teacher $teacher)
    {
        $classes = $teacher->classes;
        return view('exam.create', ['teacher' => $teacher, 'classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','max:20'],
            'description' => ['required','max:80'],
            'mark' => 'required',
            'class_id' => 'required',
            'subject_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required',
            
        ]);
        $class_id = $request->class_id;
        if (!$request->subject_id) {
            $teacher_id = $request->teacher_id;
            $subject_id = DB::table('class_subject_teacher')->where('class_id', $class_id)->where('teacher_id', $teacher_id)->value('subject_id');
        }
     
        Exam::create([
            'subject_id' => $subject_id,
            'class_id' => $class_id,
            'title' => $request->title,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'description' => $request->description,
            'mark' => $request->mark,
        ]);
        return redirect()->back()->with('success', 'Exam created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        return $exam;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        return $exam;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'subject_id' => ['required', 'exists:subjects,id'],
            'class_id' => ['required', 'exists:classes,id'],
        ]);
        $exam->update([
            'subject_id' => $request->subject_id,
            'class_id' => $request->class_id,
        ]);
        $exam->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
    }
    public function getExamsBySubjectId($subject_id)
    {
        return Exam::where('subject_id', $subject_id)->get();
    }
    public function getExamsByStudentId(Student $student)
    {
        $exams = Exam::with('students')->where('class_id', $student->class_id)->get();
        $upcoming = 0;
        $past = 0;
        $studentScore = [];

        foreach ($exams as $key => $exam) {
            $studentScore[$key] = $exam->students->where('id', $student->id)->first();
            if (Carbon::parse($exam->date)->gte(now())) {
                $upcoming = 1;
            }
            if (Carbon::parse($exam->date)->lt(now())) {
                $past = 1;
            }
        }
        return view('student.student-exams', ['exams' => $exams, 'student' => $studentScore, 'upcoming' => $upcoming, 'past' => $past]);
    }

    public function getExamsByTeacherId(Teacher $teacher)
    {
        //join assignments table with class_subject_teacher table

        $exams = Exam::join('class_subject_teacher', function ($join) use ($teacher) {
            $join->on('exams.class_id', '=', 'class_subject_teacher.class_id')
                ->on('exams.subject_id', '=', 'class_subject_teacher.subject_id')
                ->where('class_subject_teacher.teacher_id', '=', $teacher->id);
        })
            ->select('exams.*')
            ->distinct()
            ->get();
        //load subject data;
        $exams =  $exams->load('subject');
        $upcoming = 0;
        $past = 0;
        foreach ($exams as $key => $exam) {
            if (Carbon::parse($exam->date)->gte(now())) {
                $upcoming = 1;
            }
            if (Carbon::parse($exam->date)->lt(now())) {
                $past = 1;
            }
        }
        return view('teacher.teacher-exams', ['exams' => $exams, 'upcoming' => $upcoming, 'past' => $past]);
    }
}
