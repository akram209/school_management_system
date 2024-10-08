@extends('layouts.app')
@section('title', ' Student')
@section('title of sidebar', 'Dashboard')
@section('content')
    <style>
        input[type="search"] {
            margin-top: -15px
        }
    </style>
    <div class="card border-primary shadow mb-3"
        style="width: 60%; height: 50vh; position: absolute; left: 20%; top: 10% !important">
        <div class="card-header bg-primary text-white">Student Info</div>
        <div class="card-body">
            <h4 class="card-title text-primary">{{ $student->user->first_name }} {{ $student->user->last_name }}
            </h4>
            <p class="card-text"><strong>Gender:</strong> {{ $student->user->gender }}</p>
            @if ($student->class)
                <p class="card-text"><strong>Class:</strong> {{ $student->class->name }}</p>
            @endif
            <p class="card-text"><strong>Fee:</strong> {{ $student->fee->status }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $student->user->email }}</p>
            @if ($student->parent)
                <p class="card-text"><strong>Parent:</strong> {{ $student->parent[0]->user->first_name }}></p>
            @endif
            <p class="card-text"><strong>Join Date:</strong> {{ $student->created_at->format('d/m/Y') }}</p>
        </div>
    </div>



@endsection
