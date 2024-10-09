@extends('layouts.app')
@section('title', 'dashboard')
@section('title of sidebar', 'Dashboard')
<style>
    .totel-students,
    .totel-teachers,
    .totel-parents {
        position: absolute;
        top: 50px;
        width: 300px;
        height: 30vh;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .totel-fees,
    .totel-classes,
    .percentage-fees {
        position: absolute;
        top: 300px;
        width: 300px;
        height: 30vh;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .totel-students {
        right: 450px;
    }

    .totel-teachers {
        right: 800px;
    }

    .totel-parents {
        right: 1150px;
    }

    .totel-classes {
        right: 450px;
    }

    .totel-fees {
        right: 800px;
    }

    .percentage-fees {
        right: 1150px;
    }

    #students,
    #teachers,
    #parents,
    #classes,
    #fees,
    #percentage-fees {
        text-align: center;
        margin-top: 8%;
        color: #007bff;
        border-bottom: 2px solid #3498db;

        font-weight: bolder;
        font-size: 25px;
    }
</style>

<div class="profile-card" style="height: 75vh">
    <div class="profile-card-header">
        @if ($user->image)
            <img src="{{ asset('storage/images/' . $user->image) }}" alt="profile"
                class="profile-card-header-profile-img">
        @else
            <img src="{{ asset('build/assets/images/profile.jpg') }}" alt="profile"
                class="profile-card-header-profile-img">
        @endif
    </div>
    <hr>
    <div class="profile-card-body">
        <p> Full Name: {{ $user->first_name }} {{ $user->last_name }}</p>
        <p> Gender: {{ $user->gender }}</p>
        <p> Join Date: {{ $user->created_at }}</p>
    </div>
</div>
@section('content')
    <div class="totel-students">
        <p id="students">Students</p>
        <h1 style="text-align: center; margin-top: 10% ; margin-bottom: 10%">{{ $totalStudents }}
        </h1>
    </div>

    <div class="totel-teachers">
        <p id="teachers">Teachers</p>
        <h1 style="text-align: center; margin-top: 10%">{{ $totalTeachers }}</h1>
    </div>
    </div>
    <div class="totel-parents">
        <p id="parents">Parents</p>

        <h1 style="text-align: center; margin-top: 10%">{{ $totalParents }}</h1>
    </div>
    <div class="totel-fees">
        <p id="fees">Fees</p>
        <h1 style="text-align: center; margin-top: 10%">$ {{ $totalFees * 1000 }}</h1>
    </div>

    <div class="percentage-fees">
        <p id="percentage-fees">Paid fees</p>
        <div class="progress-circle">
            <svg class="progress-ring" width="120" height="120">
                <circle class="progress-fees-ring__circle" stroke="blue" stroke-width="10" fill="transparent" r="50"
                    cx="60" cy="60" />
            </svg>
            <div class="progress-value">
                <span id="percentage-value"></span>
            </div>
        </div>
    </div>


    <div class="totel-classes">
        <p id="classes">Classes</p>
        <h1 style="text-align: center; margin-top: 10%">{{ $totalClasses }}</h1>
    </div>
    <table class="table mb-4 align-middle bg-white"
        style=" position: absolute !important; top : 75% !important ; left : 5% !important ; width : 65% !important ; height : 50vh !important ;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.2) !important;">
        <thead class="bg-light">
            <tr>
                <th style="padding-right: 10% !important ">Profile</th>
                <th>Email</th>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Fee</th>
                {{-- <th>Actions</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('student.profile', $student->user_id) }}">
                                @if ($student->user->path)
                                    <img src="{{ asset('storage/images/' . $student->user->path) }}" alt="profile"
                                        style="width: 45px; height: 45px" class="rounded-circle">
                                @else
                                    <img src="{{ asset('build/assets/images/profile.jpg') }}" alt="profile"
                                        style="width: 45px; height: 45px" class="rounded-circle">
                                @endif
                            </a>
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
                    @php
                        $now = \Carbon\Carbon::now();
                        $feeUpdatedAt = $student->fee->updated_at
                            ? \Carbon\Carbon::parse($student->fee->updated_at)
                            : null;

                        // Initialize default class
                        $buttonClass = 'btn btn-sm btn-rounded';

                        // Check if the feeUpdatedAt is not null before calculating the difference
                        if ($feeUpdatedAt) {
                            $diffInDays = $feeUpdatedAt->diffInDays($now);

                            // Determine the button class based on the difference in days
                            if ($diffInDays > 30) {
                                $buttonClass .= ' btn-danger';
                            } elseif ($diffInDays > 14) {
                                $buttonClass .= ' btn-warning';
                            }
                        }
                    @endphp

                    <td>
                        <div type="button" class="{{ $buttonClass }}">
                            {{ $student->fee->status }}
                        </div>
                    </td>
            @endforeach
        </tbody>
    </table>
    <table class="table mb-4 align-middle bg-white"
        style=" position: absolute !important; top : 130% !important ; left : 5% !important ; width : 65% !important ; height : 50vh !important ;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.2) !important;">
        <thead class="bg-light">
            <tr>
                <th style="padding-right: 10% !important ">Profile</th>
                <th>Email</th>
                <th>Teacher ID</th>
                <th>Full Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('student.profile', $teacher->user_id) }}">
                                @if ($teacher->user->path)
                                    <img src="{{ asset('storage/images/' . $teacher->user->path) }}" alt="profile"
                                        style="width: 45px; height: 45px" class="rounded-circle">
                                @else
                                    <img src="{{ asset('build/assets/images/profile.jpg') }}" alt="profile"
                                        style="width: 45px; height: 45px" class="rounded-circle">
                                @endif
                            </a>
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


                    <td>
                        <div type="button" class="btn btn-sm btn-rounded">
                            {{ $teacher->status }}
                        </div>
                    </td>
            @endforeach
        </tbody>
    </table>
    <script>
        window.apiToken = '{{ auth()->user()->createToken('API Token')->plainTextToken }}';
    </script>
    <script src="{{ asset('build/assets/js/fee.js') }}"></script>
@endsection
