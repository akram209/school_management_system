<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Student;
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

        $class->load('teachers.user', 'students.user', 'subjects.teachers');
        return view('class.show', compact('class'));
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
    public function getClassByTeacherId($teacher_id)
    {
        $class = ClassModel::with('teachers')->find($teacher_id);
        return $class;
    }
    public function getClassByStudentId(Student $student)
    {

        $class = ClassModel::where('id', $student->class_id)->get()->first();
        $class->load('teachers.user', 'students.user', 'subjects.teachers');

        return view('student.student-class', compact('class'));
    }
    public function getClassByClassId(ClassModel $class)
    {
        $class->load('teachers.user', 'students.user', 'subjects.teachers');
        return view('student.student-class', compact('class'));
    }
}
