@extends('layouts.app')
@section('title', 'Teacher Profile')
@section('title of sidebar', 'Settings')
<style>
    .table-bordered thead td,
    .table-bordered thead th {
        border-bottom-width: 2px;
        padding: 10px !important;

    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #dee2e6;

    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #dee2e6;
    }

    .tabl td,
    .table th {
        padding: .5rem !important;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table {
        position: fixed !important;
        width: 50% !important;
        height: 40% !important;
        top: 50% !important;
        left: 20% !important;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
</style>

<div class="profile-card">
    <div class="profile-card-header">
        @if ($teacher->user->image)
            <img src="{{ asset('storage/images/' . $teacher->user->image) }}" alt="profile"
                class="profile-card-header-profile-img">
        @else
            <img src="{{ asset('build/assets/images/profile.jpg') }}" alt="profile"
                class="profile-card-header-profile-img">
        @endif

    </div>
    <hr>
    <div class="profile-card-body">
        <p> Full Name: {{ $teacher->user->first_name }} {{ $teacher->user->last_name }}</p>
        <p> Gender: {{ $teacher->user->gender }}</p>
        <p> Qualification: {{ $teacher->qualification }}</p>
        <p> Experience Years: {{ $teacher->experience_years }}</p>
        <p> Join Date: {{ $teacher->created_at->format('d/m/Y') }}</p>
    </div>
</div>


@section('content')

    <div class="teacher-info">
        <div class="teacher-info-header">
            <h3>Contact me</h3>
        </div>

        <div class="teacher-info-body">
            <p>address : {{ $teacher->address }}</p>
            <hr>
            <p> phone :{{ $teacher->phone }} </p>
            <hr>
            <p>Email :{{ $teacher->user->email }} </p>
        </div>

    </div>
    <div class="teacher-subject">
        <div class="teacher-subject-header">
            <h3>{{ $teacher->subjects[0]->name }}</h3>

        </div>

        <div class="teacher-subject-body">
            @if ($teacher->subjects[0]->name == 'English')
                <img id="img-subject" src="{{ asset('build/assets/images/english.png') }}" alt="">
            @elseif($teacher->subjects[0]->name == 'Maths')
                <img id="img-subject" src="{{ asset('build/assets/images/math.png') }}" alt="">
            @elseif($teacher->subjects[0]->name == 'Science')
                <img id="img-subject" src="{{ asset('build/assets/images/science.png') }}" alt="">
            @elseif($teacher->subjects[0]->name == 'History')
                <img id="img-subject" src="{{ asset('build/assets/images/history.png') }}" alt="">
            @elseif($teacher->subjects[0]->name == 'Geography')
                <img id="img-subject" src="{{ asset('build/assets/images/geography.png') }}" alt="">
            @elseif($teacher->subjects[0]->name == 'Chemistry')
                <img id="img-subject" src="{{ asset('build/assets/images/chemistry.png') }}" alt="">
            @elseif($teacher->subjects[0]->name == 'Physics')
                <img id="img-subject" src="{{ asset('build/assets/images/physics.png') }}" alt="">
            @elseif($teacher->subjects[0]->name == 'Biology')
                <img id="img-subject" src="{{ asset('build/assets/images/biology.png') }}" alt="">
            @endif

        </div>

    </div>
    <div class="container">

        <div class="table-responsive">
            <table class="table text-center table-bordered">
                <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">Time</th>
                        <th class="text-uppercase">Sunday</th>
                        <th class="text-uppercase">Monday</th>
                        <th class="text-uppercase">Tuesday</th>
                        <th class="text-uppercase">Wednesday</th>
                        <th class="text-uppercase" style="width: 18.5% !important">Thursday</th>



                    </tr>
                </thead>
                <tbody>
                    @if ($teacher)
                        @foreach ($teacher->timetables as $time)
                            <tr>
                                <td>{{ $time->start_time }}-{{ $time->end_time }}</td>

                                <td class="{{ $time->day_name == 'sunday' ? '' : 'bg-light-gray' }}">
                                    @if ($time->day_name == 'sunday')
                                        <span
                                            class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">{{ $time->class->name }}</span>
                                        <div class="margin-10px-top font-size14">{{ $time->date }}</div>
        </div>
        {{-- <div class="font-size13 text-light-gray">
            {{ $time->teacher->first_name . ' ' . $time->teacher->last_name }}</div> --}}
        @endif
        </td>
        <td class="{{ $time->day_name == 'monday' ? '' : 'bg-light-gray' }}">
            @if ($time->day_name == 'monday')
                <span
                    class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">{{ $time->class->name }}</span>
                <div class="margin-10px-top font-size14">{{ $time->date }}
                </div>
                {{-- <div class="font-size13 text-light-gray">
                    {{ $time->teacher->first_name . ' ' . $time->teacher->last_name }}</div> --}}
            @endif
        </td>
        <td class="{{ $time->day_name == 'tuesday' ? '' : 'bg-light-gray' }}">
            @if ($time->day_name == 'tuesday')
                <span
                    class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">{{ $time->class->name }}</span>
                <div class="margin-10px-top font-size14">{{ $time->date }}
                </div>
                {{-- <div class="font-size13 text-light-gray">
                    {{ $time->teacher->first_name . ' ' . $time->teacher->last_name }}</div> --}}
            @endif
        </td>
        <td class="{{ $time->day_name == 'wednesday' ? '' : 'bg-light-gray' }}">
            @if ($time->day_name == 'wednesday')
                <span
                    class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">{{ $time->class->name }}</span>
                <div class="margin-10px-top font-size14">{{ $time->date }}
                </div>
                {{-- <div class="font-size13 text-light-gray">
                    {{ $time->teacher->first_name . ' ' . $time->teacher->last_name }}</div> --}}
            @endif
        </td>
        <td class="{{ $time->day_name == 'thursday' ? '' : 'bg-light-gray' }}">
            @if ($time->day_name == 'thursday')
                <span
                    class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">{{ $time->class->name }}</span>
                <div class="margin-10px-top font-size14">{{ $time->date }}
                </div>
                {{-- <div class="font-size13 text-light-gray">
                    {{ $time->teacher->first_name . ' ' . $time->teacher->last_name }}</div> --}}
            @endif
        </td>

        </tr>
        @endforeach
        @endif
        </tbody>
        </table>
    </div>
    </div>
@endsection
