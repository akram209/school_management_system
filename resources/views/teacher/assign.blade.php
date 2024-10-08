@extends('layouts.app')
@section('title', 'Assign Teacher to class')
@section('title of sidebar', 'Settings')
<style>
    .container {
        position: absolute;
        top: 20%;
        left: 20%;
        border: 1px solid rgb(187, 183, 183);
        border-radius: 10px;
        padding: 10px;
    }
</style>




@section('content')
    {{-- <div class="container" style="position: absolute; width: 60%">
        <h3 style="text-align: center">Assign Teacher to Class and Subject</h3>
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif

        <form class="row g-3" method="POST" action="{{ route('class.store') }}">
            @csrf
            <div class="row g-3">
                <div class="col-4">
                    @error('class_id')
                        <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                    @enderror
                    <select class="form-select" name="class_id" aria-label="Default select example" style="height: 50px;"
                        title="class">
                        <option selected disabled hidden>classes</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    @error('subject_id')
                        <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                    @enderror
                    <select class="form-select" name="subject_id" aria-label="Default select example" style="height: 50px;"
                        title="subject">
                        <option selected disabled hidden>subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    @error('teacher_id')
                        <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                    @enderror
                    <select class="form-select" name="teacher_id" aria-label="Default select example" style="height: 50px;"
                        title="teacher">
                        <option selected disabled hidden>teacher</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->user->first_name }}
                                {{ $teacher->user->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="width: 100%">save</button>
            </div>
        </form>
    </div> --}}
@endsection
