<?php

namespace App\Http\Controllers;

use App\Jobs\NotificationJob;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('notification.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:30', 'min:3'],
            'body' => ['required', 'string', 'max:30', 'min:3'],
            'email' => ['required', 'exists:users,email'],
            'type' => ['required', 'in:information,danger,warning'],
        ]);

        $user = User::where('email', $request->email)->first();
        Notification::create([
            'title' => $request->title,
            'body' => $request->body,
            'message' => $request->message,
            'user_id' => $user->id,
            'type' => $request->type,
        ]);
        
        dispatch(new NotificationJob($request->email, $request->type, $request->title, $request->body));
        return redirect()->back()->with('success', 'Notification created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        return $notification;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        return $notification;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:30', 'min:3'],
            'body' => ['required', 'string', 'max:30', 'min:3'],
            'message' => ['required', 'string', 'max:50', 'min:3'],
            'user_id' => ['required', 'exists:users,id'],
            'type' => ['required', 'in:admin,student'],
        ]);
        $notification->update([
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
    public function destroy(Notification $notification)
    {
        return $notification->delete();
    }
}
