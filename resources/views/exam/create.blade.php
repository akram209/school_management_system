@extends('layouts.app')
@section('title', 'Create Exam')
@section('title of sidebar', 'Settings')
<style>
    .container {
        position: absolute;
        top: 20%;
        left: 10%;
        border: 1px solid rgb(187, 183, 183);
        border-radius: 10px;
        padding: 10px;
    }
</style>




@section('content')
    <div class="container" style="position: absolute; top: 20%; left: 10%">
        <h3 style="text-align: center">Create Exam</h3>
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif

        <form class="row g-3" method="POST" action="{{ route('exam.store') }}">
            @csrf
            <div class="row g-3">
                {{-- message --}}
                @error('description')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col-8">
                    <input type="text" name="description" class="form-control" id="inputAddress"
                        placeholder="description" style="width: 100%" title="description">
                </div>
                @error('title')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="text" name="title" class="form-control" id="inputCity" placeholder="title"
                        style="width: 100%" title="title">
                </div>
            </div>
            <div class="row g-3">
                {{-- message --}}
                @error('date')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="date" class="form-control" name="date" style="width: 100%" title="date"
                        min="{{ now()->format('Y-m-d') }}" max="{{ now()->addMonths(2)->format('Y-m-d') }}">
                </div>
                {{-- message --}}
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
            <div class="row g-3" style="margin-left: -30px !important">
                @error('class_id')
                    <div class="alert alert-danger" style="width:100% ; margin-left: 25px">{{ $message }}</div>
                @enderror
                <div class="col-4">
                    <select class="form-select" name="class_id" aria-label="Default select example" style="height: 50px;"
                        title="class">
                        <option selected disabled hidden>class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('type')
                    <div class="alert alert-danger" style="width:100% ; margin-left: 25px">{{ $message }}</div>
                @enderror
                <div class="col-4">
                    <select class="form-select" name="type" aria-label="Default select example" style="height: 50px;"
                        title="type">
                        <option selected disabled hidden>type</option>
                        <option value="mid">midterm</option>
                        <option value="final">final</option>
                    </select>
                </div>
                @error('mark')
                    <div class="alert alert-danger" style="width:100% ; margin-left: 25px">{{ $message }}</div>
                @enderror
                <div class="col-4">
                    <select class="form-select" name="mark" aria-label="Default select example" style="height: 50px;"
                        title="ful mark">
                        <option selected disabled hidden>mark</option>

                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="60">60</option>
                        <option value="70">70</option>
                        <option value="80">80</option>
                        <option value="90">90</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            @if (Auth::user()->role == 'teacher')
                <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
            @endif
            @if (Auth::user()->role == 'admin')
                @error('subject')
                    <div class="alert alert-danger" style="width:100%;margin-left: 25px">{{ $message }}</div>
                @enderror
                <div class="col-4">
                    <select class="form-select" name="subject_id" aria-label="Default select example"
                        style="height: 50px; margin-left: -5px" title="subject">
                        <option selected disabled hidden>subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach

                    </select>
                </div>

            @endif

            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="width: 100%">save</button>
            </div>
        </form>
    </div>
@endsection
