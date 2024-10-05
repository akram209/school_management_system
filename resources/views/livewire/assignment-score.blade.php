<div>
    <div class="attendence-info">

        <form class="d-flex" role="search">
            <input wire:model.live.debounce.500ms="search" class="form-control me-2" type="search" placeholder="Search"
                aria-label="Search">
        </form>
    </div>
    <table class="table align-middle mb-4 bg-white">
        <thead class="bg-light">
            <tr>
                <th style="padding-right: 8% !important ">Profile</th>
                <th>Email</th>
                <th style="padding-left: 5% ">Student ID</th>
                <th>Full Name</th>
                @if ($assignment->type == 'online')
                    <th>assignment</th>
                @endif
                <th>score</th>



            </tr>
        </thead>
        <tbody>
            @foreach ($students as $key => $student)
                <tr>

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
                    @if ($assignment->type == 'online')
                        @if ($student->pivot->path !== null)
                            <td>
                                <a href="{{ route('assignment.view', ['assignment' => $assignment->id, 'student' => $student->id]) }}"
                                    target="_blank">
                                    <i class="fa-regular fa-file-pdf"></i>
                                </a>
                            </td>
                        @else
                            <td>
                                <p> not uploaded </p>
                            </td>
                        @endif
                    @endif
                    <td>
                        <input wire:change="updateScore({{ $student->id }})" wire:model="scores.{{ $student->id }}"
                            type="number" value="{{ old('score', $student->pivot->score) }}" min="0"
                            max="{{ $assignment->mark }}" class="form-control">



                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
