@extends('layouts.app')
@section('title', ' Parent')
@section('title of sidebar', 'Dashboard')
@section('content')
    <style>
        input[type="search"] {
            margin-top: -15px
        }
    </style>
    <div class="card border-primary shadow mb-3"
        style="width: 60%; height: 70vh; position: absolute; left: 20%; top: 10% !important">
        <div class="card-header bg-primary text-white">Parent Info</div>
        <div class="card-body">
            <h4 class="card-title text-primary">{{ $parent->user->first_name }} {{ $parent->user->last_name }}
            </h4>
            <p class="card-text"><strong>Gender:</strong> {{ $parent->user->gender }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $parent->address }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $parent->phone }}</p>

            <p class="card-text"><strong>Email:</strong> {{ $parent->user->email }}</p>
            @if ($parent->students)
                @foreach ($parent->students as $student)
                    <p class="card-text"><strong>Child:</strong> {{ $student->user->first_name }} - >
                        {{ $student->fee->status }} </p>
                @endforeach
            @endif
            <p class="card-text"><strong>Join Date:</strong> {{ $parent->created_at->format('d/m/Y') }}</p>
        </div>
    </div>



@endsection
