<div>
    <div class="attendence-info">

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

                <th>Teacher ID</th>
                <th>Full Name</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>
                        <div class="form-check">
                            @php
                                $attendance = $teacher->teacherAttendences
                                    ? $teacher->teacherAttendences->first()
                                    : null;
                            @endphp

                            <input wire:change="updateAttendence({{ $teacher->id }})" class="form-check-input"
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
                        {{ $teacher->user->email }}

                    </td>

                    <td>
                        {{ $teacher->id }}
                    </td>
                    <td>
                        {{ $teacher->user->first_name . ' ' . $teacher->user->last_name }}
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
</div>
