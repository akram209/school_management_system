<table class="table mb-4 align-middle bg-white"
    style=" position: absolute !important; width: 80% !important; height: 30% !important; left: 10% !important; top: 50% !important ">
    <thead>
        <tr>
            <th colspan="2" style="padding-left: 25% !important">
                <h3>Students</h3>

            </th>
            <th style="padding-left: 20% !important">
                <form class="d-flex float-end" role="search" id="search-teacher">
                    <input wire:model.live.debounce.500ms="search" type="search" placeholder="search ">

                </form>
            </th>
        </tr>
    </thead>
    <thead class="bg-light">
        <tr>
            <th style="padding-right: 100px !important ">Profile</th>
            <th>Email</th>
            <th>Student ID</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Class</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($students as $student)
                <td>
                    <a href="{{ route('student.profile', $student->user->id) }}">
                        <div class="d-flex align-items-center">
                            @if ($student->user->image)
                                <img src="{{ asset('storage/images/' . $student->user->image) }}" alt="Student Image"
                                    style="width: 45px; height: 45px" class="rounded-circle" />
                            @else
                                <img src="{{ asset('build/assets/images/profile.jpg') }}" alt="profile"
                                    style="width: 45px; height: 45px" class="rounded-circle">
                            @endif
                        </div>
                    </a>
                </td>
                <td>{{ $student->user->email }}</td>
                <td>{{ $student->id }}</td>
                <td>{{ $student->user->first_name . ' ' . $student->user->last_name }}</td>
                <td>{{ $student->user->gender }}</td>
                <td>{{ $student->class->name }}</td>

        </tr>
        @endforeach

    </tbody>
</table>
