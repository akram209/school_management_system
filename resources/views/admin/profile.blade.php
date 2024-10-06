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

<div class="profile-card" style="height: 65vh">
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
        <p> Join Date: {{ $user->created_at->format('d/m/Y') }}</p>
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
    <script>
        window.apiToken = '{{ auth()->user()->createToken('API Token')->plainTextToken }}';
    </script>
    <script src="{{ asset('build/assets/js/fee.js') }}"></script>
@endsection
