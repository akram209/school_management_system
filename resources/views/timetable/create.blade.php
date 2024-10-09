@extends('layouts.app')
@section('title', 'Create Timetable')
@section('title of sidebar', 'Dashboard')
<style>
    .container {
        position: absolute;
        top: 20%;
        left: 10%;
        border: 1px solid rgb(187, 183, 183);
        border-radius: 10px;
        padding: 10px;
    }

    select {
        height: 50px !important;
        margin-left: -3px !important;
    }
</style>




@section('content')
    <div class="container" style="position: absolute; top: 20%; left: 10%">
        <h3 style="text-align: center">Create Timetable</h3>
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif

        <form class="row g-3" method="POST" action="{{ route('timetable.store') }}">
            @csrf

            <div class="row g-3">
                @error('day_name')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <select class="form-select" name="day_name" aria-label="Default select example">
                        <option selected disabled hidden>days</option>
                        <option value="sunday">sunday</option>
                        <option value="monday">monday</option>
                        <option value="tuesday">tuesday</option>
                        <option value="wednesday">wednesday</option>
                        <option value="thursday">thursday</option>
                    </select>

                </div>
                @error('class_id')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <select class="form-select" name="class_id" aria-label="Default select example">
                        <option selected disabled hidden>classes</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="row g-3">
                @error('teacher_id')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <select class="form-select" name="teacher_id" aria-label="Default select example">
                        <option selected disabled hidden>teachers</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->user->first_name }}
                                {{ $teacher->user->last_name }}</option>
                        @endforeach
                    </select>

                </div>
                @error('subject_id')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <select class="form-select" name="subject_id" aria-label="Default select example">
                        <option selected disabled hidden>subjects</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="row g-3">
                @error('start_time')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="time" class="form-control" name="start_time" style="width: 100%" title="start time">

                </div>
                @error('end_time')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="time" class="form-control" name="end_time" style="width: 100%" title="end time">

                </div>

            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="width: 100%">save</button>
            </div>
        </form>
    </div>
@endsection
