<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = ClassModel::all();
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
            'name' => ['required', 'string', 'max:30', 'min:3'],
        ]);
        ClassModel::create([
            'name' => $request->name,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassModel $class)
    {
        return $this->showClassDetails($class);
    }

    public function getClassByTeacherId(Teacher $teacher)
    {
        $class = ClassModel::where('id', $teacher->class_id)
            ->with([
                'teachers.user',
                'students.user',
                'subjects.teachers'
            ])->firstOrFail();

        return $this->showClassDetails($class);
    }

    public function getClassByStudentId(Student $student)
    {
        $class = ClassModel::where('id', $student->class_id)
            ->with([
                'teachers.user',
                'students.user',
                'subjects.teachers'
            ])->firstOrFail();

        return $this->showClassDetails($class);
    }

    private function showClassDetails(ClassModel $class)
    {
        $class->loadMissing([
            'teachers.user',
            'students.user',
            'subjects.teachers'
        ]);

        // Counts for students and teachers
        $student_count = $class->students->count();
        $teacher_count = $class->teachers->count();
        $female_students_count = $class->students->filter(function ($student) {
            return $student->user->gender === 'female';
        })->count();

        $male_students_count = $class->students->filter(function ($student) {
            return $student->user->gender === 'male';
        })->count();

        // Apply filtering to teachers based on user gender
        $female_teachers_count = $class->teachers->filter(function ($teacher) {
            return $teacher->user->gender === 'female';
        })->count();

        $male_teachers_count = $class->teachers->filter(function ($teacher) {
            return $teacher->user->gender === 'male';
        })->count();

        $subject_count = $class->subjects->count();

        return view('class.show', [
            'class' => $class,
            'student_count' => $student_count,
            'teacher_count' => $teacher_count,
            'female_students_count' => $female_students_count,
            'male_students_count' => $male_students_count,
            'female_teachers_count' => $female_teachers_count,
            'male_teachers_count' => $male_teachers_count,
            'subject_count' => $subject_count
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassModel $classModel)
    {
        return $classModel;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassModel $classModel)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:30', 'min:3'],
        ]);

        $classModel->update([
            'name' => $request->name,
        ]);
        $classModel->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(classmodel $classModel)
    {
        $classModel->delete();
    }
}
