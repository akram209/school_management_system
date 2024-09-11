<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        dd($permissions);
        return $permissions;

    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Permission $permission)
    {
        // Validate the request
        request()->validate([
            'email' => ['required', 'email'],
            'code' => ['required'],
            'type' => ['required'],
        ]);

        // Create a new permission and save it to the database
        $permission = Permission::create([
            'email' => request('email'),
            'code' => request('code'),
            'type' => request('type'),
        ]);

        return $permission;
       
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        
        return $permission;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Permission $permission)
    {
        // Validate the request
        request()->validate([
            'email' => ['required', 'email'],
            'code' => ['required'],
            'type' => ['required'],
        ]);

        // Update the permission
        $permission->update([
            'email' => request('email'),
            'code' => request('code'),
            'type' => request('type'),
        ]);

        return $permission;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        
    }
}
