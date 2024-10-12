@extends('layouts.app')
@section('title', $student->user->first_name . ' ' . $student->user->last_name)
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

    p {
        text-align: center !important;
        margin-bottom: 30px !important;
        margin-left: 10px !important;
        color: #000000;

        font-weight: 600;
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
        @if ($student->user->image)
            <img src="{{ asset('storage/images/' . $student->user->image) }}" alt="profile"
                class="profile-card-header-profile-img">
        @else
            <img src="{{ asset('build/assets/images/profile.jpg') }}" alt="profile"
                class="profile-card-header-profile-img">
        @endif

    </div>
    <hr>
    <div class="profile-card-body">
        <p> Student ID: {{ $student->id }}</p>
        <p> Full Name: {{ $student->user->first_name }} {{ $student->user->last_name }}</p>
        <p> Email: {{ $student->user->email }}</p>
        <p> Gender: {{ $student->user->gender }}</p>
        @if ($student->class)
            <p> Class: {{ $student->class->name }}</p>
        @endif
        <p> Join Date: {{ $student->created_at->format('d/m/Y') }}</p>



    </div>
</div>

@section('content')
    <div class="totel-attendence">
        <p id="attendence">Attendance</p>
        <div class="progress-circle">
            <svg class="progress-ring" width="120" height="120">
                <circle class="progress-attendence-ring__circle" stroke="blue" stroke-width="10" fill="transparent" r="50"
                    cx="60" cy="60" />
            </svg>
            <div class="progress-value">
                <span id="percentage-attendence"></span>
            </div>
        </div>
    </div>

    <div class="totel-absence">
        <p id="absence">Absence</p>
        <div class="progress-circle">
            <svg class="progress-ring" width="120" height="120">
                <circle class="progress-absence-ring__circle" stroke="blue" stroke-width="10" fill="transparent" r="50"
                    cx="60" cy="60" />
            </svg>
            <div class="progress-value">
                <span id="percentage-absence"></span>
            </div>
        </div>
    </div>
    <div class="totel-assignment">
        <p id="assignment">Assignment</p>
        <div class="progress-circle">
            <svg class="progress-ring" width="120" height="120">
                <circle class="progress-assignment-ring__circle" stroke="blue" stroke-width="10" fill="transparent" r="50"
                    cx="60" cy="60" />
            </svg>
            <div class="progress-value">
                <span id="percentage-assignment"></span>
            </div>
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
                    @if ($student->class)
                        {{-- Group timetable data by start_time --}}
                        @php
                            $timetables = $student->class->timetable->groupBy('start_time');
                        @endphp

                        @foreach ($timetables as $startTime => $time)
                            <tr>
                                {{-- Show Time Period --}}
                                <td>{{ $time->first()->start_time }} - {{ $time->first()->end_time }}</td>

                                {{-- Days --}}
                                <td>
                                    @if ($sunday = $time->where('day_name', 'sunday')->first())
                                        <span
                                            class="text-white bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                            {{ $sunday->subject->name }}
                                        </span>
                                        <div class="font-size15 text-gray">{{ $sunday->teacher->user->first_name }}
                                    @endif
                                </td>

                                <td>
                                    @if ($monday = $time->where('day_name', 'monday')->first())
                                        <span
                                            class="text-white bg-black padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                            {{ $monday->subject->name }}
                                        </span>
                                        <div class="font-size15 text-gray">{{ $sunday->teacher->user->first_name }}
                                    @endif
                                </td>

                                <td>
                                    @if ($tuesday = $time->where('day_name', 'tuesday')->first())
                                        <span
                                            class="text-white bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                            {{ $tuesday->subject->name }}
                                        </span>
                                        <div class="font-size15 text-gray">{{ $sunday->teacher->user->first_name }}
                                    @endif
                                </td>

                                <td>
                                    @if ($wednesday = $time->where('day_name', 'wednesday')->first())
                                        <span
                                            class="text-white bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                            {{ $wednesday->subject->name }}
                                        </span>
                                        <div class="font-size15 text-gray">{{ $sunday->teacher->user->first_name }}
                                    @endif
                                </td>

                                <td>
                                    @if ($thursday = $time->where('day_name', 'thursday')->first())
                                        <span
                                            class="text-white bg-blue padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom font-size16 xs-font-size13">
                                            {{ $thursday->subject->name }}
                                        </span>
                                        <div class="font-size15 text-gray">{{ $sunday->teacher->user->first_name }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @if (!$student->class)
        <x-class-form :studentId="$student->id" />
    @endif
    <script>
        window.studentId = '{{ $student->id }}';
        window.apiToken = '{{ auth()->user()->createToken('API Token')->plainTextToken }}';
    </script>
    <script src="{{ asset('build/assets/js/attend.js') }}"></script>


    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Keep the loading screen visible for 5 seconds
            setTimeout(function() {
                document.getElementById('loading').style.display = 'none';
            }, 500); // 5000 milliseconds = 5 seconds
        });

        // Optionally, show the loading screen again when navigating away
        window.addEventListener("beforeunload", function() {
            document.getElementById('loading').style.display = 'fixed';
        });
    </script>
@endsection
