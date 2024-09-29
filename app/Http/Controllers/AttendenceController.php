<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendence;
use App\Models\Student;
use App\Models\ClassModel;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = Attendence::all();
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
    public function update(Request $request, Attendence $attendence)
    {
        $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'date' => ['required'],
            'status' => ['required', 'in:present,absent'],
        ]);
        $attendence->update([
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
    public function getAttendencesByStudentId(Student $student)
    {
        $attendence = Attendence::where('student_id', $student->id)->get();
        $attendence = $attendence->load('student.user');
        $presents = $attendence->where('status', 'present')->count();
        $absents = $attendence->where('status', 'absent')->count();


        return view('student.student-attendence', [
            'attendences' => $attendence,
            'presents' => $presents,
            'absents' => $absents,
        ]);
    }
    public function takeAttendenceByClassId(ClassModel $class)
    {
        $class = ClassModel::with('students.user', 'students.attendence')->find($class->id);
        $class = ClassModel::with('students.user', 'students.attendence')->find($class->id);
        $students = $class->students;
        $status = [];

        foreach ($students as $studentKey => $student) {
            if ($student->attendence) {
                // Filter attendance for today's date outside the inner loop
                $todayAttendance = $student->attendence->where('date', now()->format('Y-m-d'))->first();

                if ($todayAttendance) {
                    if ($todayAttendance->status == 'absent') {
                        $status[$studentKey] = 0; // Mark as absent
                    } else {
                        $status[$studentKey] = 1; // Mark as present
                    }
                } else {
                    $status[$studentKey] = 0; // No attendance record means absent
                }
            } else {
                $status[$studentKey] = 0; // No attendance relationship, mark as absent
            }
        }

        return view('attendence.take-attendence', [
            'status' => $status,
            'students' => $students
        ]);
    }
}
