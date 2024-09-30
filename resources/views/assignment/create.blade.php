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
        <h3 style="text-align: center">Create Assignment</h3>
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif

        <form class="row g-3" method="POST" action="{{ route('assignment.store') }}">
            @csrf
            <div class="row g-3">
                {{-- message --}}

                <div class="col-8">
                    <input type="text" name="description" class="form-control" id="inputAddress"
                        placeholder="description" style="width: 100%" title="description">
                </div>
                <div class="col">
                    <input type="text" name="title" class="form-control" id="inputCity" placeholder="title"
                        style="width: 100%" title="title">
                </div>
            </div>
            <div class="row g-3">
                {{-- message --}}

                <div class="col">
                    <input type="date" class="form-control" name="deadline" style="width: 100%" title="deadline">
                </div>
                <div class="col">
                    <input type="time" class="form-control" name="time" style="width: 100%" title="deadline time">
                </div>

            </div>
            <div class="row g-3" style="margin-left: -30px !important">
                <div class="col-4">
                    <select class="form-select" name="class_id" aria-label="Default select example" style="height: 50px;"
                        title="class">
                        <option selected disabled hidden>class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <select class="form-select" name="type" aria-label="Default select example" style="height: 50px;"
                        title="type">
                        <option selected disabled hidden>type</option>
                        <option value="mid">online</option>
                        <option value="final">offline</option>
                    </select>
                </div>
                <div class="col-4">
                    <select class="form-select" name="mark" aria-label="Default select example" style="height: 50px;"
                        title="ful mark">
                        <option selected disabled hidden>mark</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>

                    </select>
                </div>
            </div>
            <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">

            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="width: 100%">save</button>
            </div>
        </form>
    </div>
@endsection
