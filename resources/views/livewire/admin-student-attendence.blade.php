<div>
    <div class="attendence-info">
        <select wire:model.live.debounce.500ms="class_id" class="form-select" aria-label="Default select example">
            @foreach ($classes as $class)
                <option value="{{ $class->id }}" @if ($class->id == $class_id) selected @endif>{{ $class->name }}
                </option>
            @endforeach
        </select>
        <form class="d-flex" role="search">
            <input wire:model.live.debounce.500ms="date" class="form-control me-2" type="search" placeholder="Search"
                aria-label="Search">
        </form>
    </div>
    <table class="table align-middle mb-4 bg-white">
        <thead class="bg-light">
            <tr>
                <th style="padding-right: 10% !important "> attendenece </th>
                <th style="padding-right: 10% !important ">Profile</th>
                <th>Email</th>

                <th>Student ID</th>
                <th>Full Name</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>
                        <div class="form-check">
                            @php
                                $attendance = $student->attendence ? $student->attendence->first() : null;
                            @endphp

                            <input wire:change="updateAttendence({{ $student->id }})" class="form-check-input"
                                type="checkbox" value="" id="flexCheckDefault"
                                style="border: black 1px solid !important"
                                @if ($attendance && $attendance->status == 'present') checked @endif>
                        </div>
                    </td>

                    <td>

                        <div class="d-flex align-items-center">
                            <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="Student Image"
                                style="width: 45px; height: 45px" class="rounded-circle" />

                        </div>
                    </td>
                    <td>
                        {{ $student->user->email }}

                    </td>

                    <td>
                        {{ $student->id }}
                    </td>
                    <td>
                        {{ $student->user->first_name . ' ' . $student->user->last_name }}
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
</div>
