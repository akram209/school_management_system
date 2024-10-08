@extends('layouts.app')
@section('title', ' Teacher')
@section('title of sidebar', 'Dashboard')
@section('content')
    <style>
        input[type="search"] {
            margin-top: -15px
        }
    </style>
    <div class="card border-primary shadow mb-3"
        style="width: 60%; height: 70vh; position: absolute; left: 20%; top: 10% !important">
        <div class="card-header bg-primary text-white">Teacher Info</div>
        <div class="card-body">
            <h4 class="card-title text-primary">{{ $teacher->user->first_name }} {{ $teacher->user->last_name }}
            </h4>
            <p class="card-text"><strong>Gender:</strong> {{ $teacher->user->gender }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $teacher->address }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $teacher->phone }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $teacher->user->email }}</p>
            <p class="card-text"><strong>Qualification:</strong> {{ $teacher->qualification }}></p>
            <p class="card-text"><strong>Experience Years:</strong> {{ $teacher->experience_years }}</p>
            <p class="card-text"><strong>Join Date:</strong> {{ $teacher->created_at->format('d/m/Y') }}</p>
        </div>
    </div>



@endsection
