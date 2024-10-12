@extends('layouts.app')
@section('title', 'Parent Profile')
@section('title of sidebar', 'Settings')

<style>
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
<div class="profile-card" style="height: 70vh">
    <div class="profile-card-header">
        @if ($parent->user->image)
            <img src="{{ asset('storage/images/' . $parent->user->image) }}" alt="profile"
                class="profile-card-header-profile-img">
        @else
            <img src="{{ asset('build/assets/images/profile.jpg') }}" alt="profile"
                class="profile-card-header-profile-img">
        @endif

    </div>
    <hr>
    <div class="profile-card-body">
        <p> Parent ID : {{ $parent->id }} </p>
        <p>Full Name: {{ $parent->user->first_name }} {{ $parent->user->last_name }}</p>
        <p>Gender : {{ $parent->user->gender }}</p>
        <p>Join Date : {{ $parent->created_at->format('d/m/Y') }}</p>

    </div>
</div>

@section('content')
    <div class="teacher-info" style="width: 60%">
        <div class="teacher-info-header">
            <h3>Contact me</h3>
        </div>

        <div class="teacher-info-body">
            <p>address : {{ $parent->address }}</p>
            <hr>
            <p> phone : {{ $parent->phone }}</p>
            <hr>
            <p>Email : {{ $parent->user->email }}</p>
        </div>

    </div>


    <div class="accordion accordion-flush" id="accordionFlushExample"
        style="position: fixed !important; top: 40% !important; width: 60%; left: 11% ; border: 2px solid  #dee2e6;">
        @foreach ($parent->students as $key => $student)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false"
                        aria-controls="flush-collapse{{ $key }}">
                        {{ $student->user->first_name }}
                    </button>
                </h2>
                <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <p>Student ID : {{ $student->id }}</p>
                        <p>Class : {{ $student->class->name }}</p>
                        <p>Fee : {{ $student->fee->status }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Keep the loading screen visible for 5 seconds
            setTimeout(function() {
                document.getElementById('loading').style.display = 'none';
            }, 500);
        });

        // Optionally, show the loading screen again when navigating away
        window.addEventListener("beforeunload", function() {
            document.getElementById('loading').style.display = 'fixed';
        });
    </script>
@endsection
