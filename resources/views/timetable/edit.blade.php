@extends('layouts.app')
@section('title', 'Edit Timetable')
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
    <div class="container">
        <h3 style="text-align: center">Update Timetable</h3>
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Update Form -->
        <form class="row g-3" method="POST" action="{{ route('timetable.update', $timetable->id) }}">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->

            <div class="row g-3">
                @error('day_name')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <select class="form-select" name="day_name" aria-label="Default select example">
                        <option disabled hidden>Days</option>
                        <option value="sunday" {{ $timetable->day_name == 'sunday' ? 'selected' : '' }}>Sunday</option>
                        <option value="monday" {{ $timetable->day_name == 'monday' ? 'selected' : '' }}>Monday</option>
                        <option value="tuesday" {{ $timetable->day_name == 'tuesday' ? 'selected' : '' }}>Tuesday</option>
                        <option value="wednesday" {{ $timetable->day_name == 'wednesday' ? 'selected' : '' }}>Wednesday
                        </option>
                        <option value="thursday" {{ $timetable->day_name == 'thursday' ? 'selected' : '' }}>Thursday
                        </option>
                    </select>
                </div>

                @error('class_id')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <select class="form-select" name="class_id" aria-label="Default select example">
                        <option disabled hidden>Classes</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}" {{ $timetable->class_id == $class->id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
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
                        <option disabled hidden>Teachers</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}"
                                {{ $timetable->teacher_id == $teacher->id ? 'selected' : '' }}>
                                {{ $teacher->user->first_name }} {{ $teacher->user->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @error('subject_id')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <select class="form-select" name="subject_id" aria-label="Default select example">
                        <option disabled hidden>Subjects</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}"
                                {{ $timetable->subject_id == $subject->id ? 'selected' : '' }}>
                                {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-3">
                @error('start_time')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="time" class="form-control" name="start_time" value="{{ $timetable->start_time }}"
                        style="width: 100%" title="start time">
                </div>

                @error('end_time')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="time" class="form-control" name="end_time" value="{{ $timetable->end_time }}"
                        style="width: 100%" title="end time">
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="width: 100%">Update</button>
            </div>
        </form>
    </div>
@endsection
