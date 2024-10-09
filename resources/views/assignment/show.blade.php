@extends('layouts.app')
@section('title', ' Assignment')
@section('title of sidebar', 'Dashboard')
@section('content')
    <style>
        input[type="search"] {
            margin-top: -15px
        }
    </style>
    <div class="card border-primary shadow mb-3"
        style="width: 60%; height: 50vh; position: absolute; left: 20%; top: 10% !important">
        <div class="card-header bg-primary text-white">Assignment Info</div>
        <div class="card-body">
            <h4 class="card-title text-primary">{{ $assignment->title }}</h4>
            </h4>
            <p class="card-text"><strong>Description:</strong> {{ $assignment->description }}</p>
            <p class="card-text"><strong>Deadline:</strong> {{ $assignment->deadline }}</p>
            <p class="card-text"><strong>Created Date:</strong> {{ $assignment->created_at->format('d/m/Y') }}</p>
            <p class="card-text"><strong>Type:</strong> {{ $assignment->type }}</p>
            <p class="card-text"><strong>Class:</strong> {{ $assignment->class->name }}</p>
            <p class="card-text"><strong>Subject:</strong> {{ $assignment->subject->name }}</p>
        </div>
    </div>



@endsection
