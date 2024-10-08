<?php

namespace App\Livewire;

use App\Models\Permission;
use Livewire\Attributes\On;
use Livewire\Component;

class Permissions extends Component
{
    #[On('permission-event')]
    public function listenPermissionEvent() {}
    public function delete($id)
    {
        Permission::find($id)->delete();
    }
    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.permissions', ['permissions' => $permissions]);
    }
}
