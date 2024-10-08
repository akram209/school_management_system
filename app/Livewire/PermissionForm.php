<?php

namespace App\Livewire;

use App\Events\PermissionEvent;
use App\Jobs\PermissionJob;
use App\Models\Permission;
use Livewire\Attributes\Rule;
use Illuminate\Support\Str;

use Livewire\Component;

class PermissionForm extends Component
{

    public $email;
    public function SendPermission()
    {

        $this->validate([
            'email' => 'required|email|unique:permissions,email',
        ]);
        $permission = Permission::create([
            'email' => $this->email,
            'code' => $this->generateRandomCode()

        ]);
        $this->dispatch('permission-event', permission: $permission);
        PermissionJob::dispatch($permission->id);

        $this->reset('email');
    }
    public function generateRandomCode()
    {
        // Generating a 6-character random code
        return Str::random(6);
    }
    public function render()
    {
        return view('livewire.permission-form');
    }
}
