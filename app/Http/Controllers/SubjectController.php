<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return $subjects;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Subject $subject)
    {
        //

        // Validate the request
        request()->validate([
            'name' => ['required', 'string', 'max:30', 'min:3'],
        ]);

        // Create a new subject and save it to the database
        $subject = Subject::create([
            'name' => request('name'),
        ]);

        return $subject;

    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
        return $subject;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Subject $subject)
    {
        //

        // Validate the request
        request()->validate([
            'name' => ['required', 'string', 'max:30', 'min:3'],
        ]);

        // Create a new subject and save it to the database
        $subject->update([
            'name' => request('name'),
        ]);

        return $subject;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        
    }
}
