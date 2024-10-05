@extends('layouts.app')
@section('title', 'Parent Profile')
@section('title of sidebar', 'Settings')




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

@endsection
