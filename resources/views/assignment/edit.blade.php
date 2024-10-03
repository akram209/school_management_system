@extends('layouts.app')
@section('title', 'Edit Assignment')
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
        <h3 style="text-align: center">Edit Assignment</h3>


        <form class="row g-3" method="POST" action="{{ route('assignment.update', $assignment->id) }}">
            @method('PUT')
            @csrf
            <div class="row g-3">
                {{-- message --}}
             
                
                
                @error('description')
                    <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col-8">
                    <input type="text" name="description" class="form-control" id="inputAddress" placeholder="description"
                        style="width: 100%" title="description" value="{{ old('description', $assignment->description) }}">
                </div>
                @error('title')
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="text" name="title" class="form-control" id="inputCity" placeholder="title"
                        style="width: 100%" title="title" value="{{ old('title', $assignment->title) }}">
                </div>
            </div>
            <div class="row g-3">
                {{-- message --}}
                @error('date')
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                  @enderror
                <div class="col">
                    <input type="date" class="form-control" name="deadline" style="width: 100%" title="deadline"
                        value="{{ old('deadline', $assignment->deadline) }}">
                </div>
                @error('time')
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
            @enderror
                <div class="col">
                    <input type="time" class="form-control" name="time" style="width: 100%" title="deadline time"
                        value="{{ old('time', $assignment->time) }}">
                </div>

            </div>
            <div class="row g-3" style="margin-left: -30px !important">
                @error('class_id')
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
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
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
            @enderror
                <div class="col-4">
                    <select class="form-select" name="type" aria-label="Default select example" style="height: 50px;"
                        title="type">
                        <option selected disabled hidden>type</option>
                        <option value="online" {{ old('type', $assignment->type) == 'online' ? 'selected' : '' }}>online
                        </option>
                        <option value="offline" {{ old('type', $assignment->type) == 'offline' ? 'selected' : '' }}>offline
                        </option>
                    </select>
                </div>
                @error('mark')
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col-4">
                    <select class="form-select" name="mark" aria-label="Default select example" style="height: 50px;"
                        title="ful mark">
                        <option selected disabled hidden>mark</option>
                        <option value="5" {{ old('mark', $assignment->mark) == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ old('mark', $assignment->mark) == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ old('mark', $assignment->mark) == 20 ? 'selected' : '' }}>20</option>
                        <option value="30" {{ old('mark', $assignment->mark) == 30 ? 'selected' : '' }}>30</option>

                    </select>
                </div>
            </div>
            <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="width: 100%">update</button>
            </div>
        </form>
    </div>
@endsection
