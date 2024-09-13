<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index=Notification::all();
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
            'title' => ['required', 'string', 'max:30', 'min:3'],
            'body' => ['required', 'string', 'max:30', 'min:3'],
            'message' => ['required', 'string', 'max:50', 'min:3'],
            'user_id' => ['required', 'exists:users,id'],
            'type' => ['required', 'in:admin,student'],
        ]);

        Notification::create([
            'title' => $request->title,
            'body' => $request->body,
            'message' => $request->message,
            'user_id' => $request->user_id,
            'type' => $request->type,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Notitification $notification)
    {
        return $notification;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notitification $notification)
    {
        return $notification;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notitification $notification)
    {
       $request->validate([
           'title' => ['required', 'string', 'max:30', 'min:3'],
           'body' => ['required', 'string', 'max:30', 'min:3'],
           'message' => ['required', 'string', 'max:50', 'min:3'],
           'user_id' => ['required', 'exists:users,id'],
           'type' => ['required', 'in:admin,student'],
       ]);
       Notification::update([
           'title' => $request->title,
           'body' => $request->body,
           'message' => $request->message,
           'user_id' => $request->user_id,
           'type' => $request->type,
       ]);
       $notification->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notitification $notification)
    {
        return $notification->delete();
    }
}
