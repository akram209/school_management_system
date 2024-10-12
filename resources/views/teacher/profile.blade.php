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

    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 1);
        /* Slight white overlay */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999 !important;
        /* Ensure it sits above other content */
    }

    /* Spinner styles */
    .spinner {
        border: 8px solid #f3f3f3;
        /* Light gray */
        border-top: 8px solid #3498db;
        /* Blue */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    /* Spinner animation */
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div id="loading" class="loading-overlay">
    <div class="spinner"></div>
    <p>Loading, please wait...</p>
</div>
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
                    @php
                        // Group the timetable by start_time
                        $timetables = $teacher->timetables->groupBy('start_time');
                    @endphp

                    @foreach ($timetables as $startTime => $time)
                        <tr>
                            {{-- Show Time Period --}}
                            <td>{{ $startTime }} - {{ $time->first()->end_time }}</td>

                            {{-- Days --}}
                            <td class="{{ $time->where('day_name', 'sunday')->isNotEmpty() ? '' : 'bg-light-gray' }}">
                                @if ($sunday = $time->where('day_name', 'sunday')->first())
                                    <span
                                        class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                        {{ $sunday->class->name }}
                                    </span>
                                    <div class="margin-10px-top font-size14">{{ $sunday->date }}</div>
                                @endif
                            </td>

                            <td class="{{ $time->where('day_name', 'monday')->isNotEmpty() ? '' : 'bg-light-gray' }}">
                                @if ($monday = $time->where('day_name', 'monday')->first())
                                    <span
                                        class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                        {{ $monday->class->name }}
                                    </span>
                                    <div class="margin-10px-top font-size14">{{ $monday->date }}</div>
                                @endif
                            </td>

                            <td class="{{ $time->where('day_name', 'tuesday')->isNotEmpty() ? '' : 'bg-light-gray' }}">
                                @if ($tuesday = $time->where('day_name', 'tuesday')->first())
                                    <span
                                        class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                        {{ $tuesday->class->name }}
                                    </span>
                                    <div class="margin-10px-top font-size14">{{ $tuesday->date }}</div>
                                @endif
                            </td>

                            <td class="{{ $time->where('day_name', 'wednesday')->isNotEmpty() ? '' : 'bg-light-gray' }}">
                                @if ($wednesday = $time->where('day_name', 'wednesday')->first())
                                    <span
                                        class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                        {{ $wednesday->class->name }}
                                    </span>
                                    <div class="margin-10px-top font-size14">{{ $wednesday->date }}</div>
                                @endif
                            </td>

                            <td class="{{ $time->where('day_name', 'thursday')->isNotEmpty() ? '' : 'bg-light-gray' }}">
                                @if ($thursday = $time->where('day_name', 'thursday')->first())
                                    <span
                                        class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                        {{ $thursday->class->name }}
                                    </span>
                                    <div class="margin-10px-top font-size14">{{ $thursday->date }}</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Keep the loading screen visible for 5 seconds
            setTimeout(function() {
                document.getElementById('loading').style.display = 'none';
            }, 2000); // 5000 milliseconds = 5 seconds
        });

        // Optionally, show the loading screen again when navigating away
        window.addEventListener("beforeunload", function() {
            document.getElementById('loading').style.display = 'fixed';
        });
    </script>
@endsection
