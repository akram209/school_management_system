<div>


    <table class="table align-middle mb-4 bg-white"
        style=" position: absolute !important; top : 20% !important ;
                left : 15% !important ; width : 70% !important ; height : 70vh !important ; box-shadow: 0 0 10px rgba(0, 0,
                0, 0.2) !important;">
        <thead class="bg-light">
            <tr>
                <th>id</th>
                <th>title</th>
                <th>user_id</th>
                <th>body</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $notification)
                <tr>
                    <td> {{ $notification->id }}</td>
                    <td> {{ $notification->title }}</td>
                    <td> {{ $notification->user_id }}</td>
                    <td> {{ $notification->body }}</td>
                    <td> {{ $notification->created_at }}</td>
                    <td> <span wire:click="delete({{ $notification->id }})" style="cursor:pointer"><i
                                class="fa-regular fa-trash-can"></i></span>
                    </td>
            @endforeach
            </tr>
        </tbody>
    </table>
</div>
