<div>
    @if ($edit_id != 0)
        <div style="position: absolute; top: 40px; left: 40%">
            @error('class_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('class_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    @endif


    <table class="table align-middle mb-4 bg-white ">
        <thead class="bg-light">
            <tr>
                <th>Class Id</th>
                <th>Class Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($classes as $class)
                <tr>

                    <td>{{ $class->id }}</td>

                    @if ($edit_id == $class->id)
                        <td>
                            <input wire:model="class_name" type="text"
                                class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-1">
                        </td>
                    @else
                        <td><a href="{{ route('class.show', $class->id) }}"
                                style="text-decoration: none ; color: black">{{ $class->name }}</a>
                        </td>
                    @endif
                    <td>{{ $class->created_at }}</td>
                    @if ($edit_id != $class->id)
                        <td>
                            <div class="dropdown">
                                <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a wire:click="edit({{ $class->id }})" class="dropdown-item"
                                            href="#">edit</a></li>
                                    <li><a wire:click="delete({{ $class->id }})" class="dropdown-item"
                                            href="#">delete</a></li>
                                    <li><a class="dropdown-item" href="{{ route('class.show', $class->id) }}">view</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    @else
                        <td>
                            <button type="button" class="btn btn-success" wire:click="update({{ $class->id }})">
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
