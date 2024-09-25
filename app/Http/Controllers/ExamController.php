<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Student;
use Carbon\Carbon;
use Database\Seeders\ExamSeeder;
use Illuminate\Http\Request;

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
            'subject_id' => ['required', 'exists:subjects,id'],
            'class_id' => ['required', 'exists:classes,id'],
        ]);
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
}
