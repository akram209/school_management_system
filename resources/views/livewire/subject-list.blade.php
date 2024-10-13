<div>
    @if ($edit_id != 0)
        <div style="position: absolute; top: 40px; left: 40%">
            @error('subject_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('subject_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    @endif


    <table class="table align-middle mb-4 bg-white "
        style=" position: absolute !important; top : 43% !important ;
    left : 15% !important ; width : 70% !important ; height : 50vh !important ; box-shadow: 0 0 10px rgba(0, 0,
    0, 0.2) !important;">
        <thead class="bg-light">
            <tr>
                <th>subject Id</th>
                <th>subject Name</th>
                <th>description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($subjects as $subject)
                <tr>

                    <td>{{ $subject->id }}</td>

                    @if ($edit_id == $subject->id)
                        <td>
                            <input wire:model="subject_name" type="text"
                                class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-1">
                        </td>
                    @else
                        <td><a href="" style="text-decoration: none ; color: black">{{ $subject->name }}</a>
                        </td>
                    @endif
                    <td>{{ $subject->description }}</td>
                    @if ($edit_id != $subject->id)
                        <td>
                            <div class="dropdown">
                                <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a wire:click="edit({{ $subject->id }})" class="dropdown-item"
                                            href="#">edit</a></li>
                                    <li><a wire:click="delete({{ $subject->id }})" class="dropdown-item"
                                            href="#">delete</a></li>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    @else
                        <td>
                            <button type="button" class="btn btn-success" wire:click="update({{ $subject->id }})">
                                Update</button>
                            <button type="button" class="btn btn-danger" wire:click="cancel()">
                                Cancel
                            </button>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
