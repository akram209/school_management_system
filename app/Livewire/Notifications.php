<?php

namespace App\Livewire;

use App\Models\Notification;
use Livewire\Attributes\On;
use Livewire\Component;

class Notifications extends Component
{
    #[On('permission-event')]
    public function listenPermissionEvent() {}
    public function delete($id)
    {
        Notification::find($id)->delete();
    }
    public function render()
    {
        $notifications = Notification::all();
        return view('livewire.notifications', ['notifications' => $notifications]);
    }
}
