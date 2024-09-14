<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
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
    public function show(ClassModel $classModel)
    {
        return $classModel;
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
