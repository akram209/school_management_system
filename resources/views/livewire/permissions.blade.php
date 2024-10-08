<div>


    <table class="table align-middle mb-4 bg-white"
        style=" position: absolute !important; top : 43% !important ;
                left : 15% !important ; width : 70% !important ; height : 50vh !important ; box-shadow: 0 0 10px rgba(0, 0,
                0, 0.2) !important;">
        <thead class="bg-light">
            <tr>
                <th>Email</th>
                <th>Code</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td> {{ $permission->email }}</td>
                    <td> {{ $permission->code }}</td>
                    <td> {{ $permission->created_at }}</td>
                    <td> <span wire:click="delete({{ $permission->id }})" style="cursor:pointer"><i
                                class="fa-regular fa-trash-can"></i></span>
                    </td>
            @endforeach
            </tr>
        </tbody>
    </table>
</div>
