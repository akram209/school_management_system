@extends('layouts.app')
@section('title', 'Edit Exam')
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
        <h3 style="text-align: center">Edit Exam</h3>


        <form class="row g-3" method="POST" action="{{ route('exam.update', $exam->id) }}">
            @method('PUT')
            @csrf
            <div class="row g-3">
                {{-- message --}}
                @error('description')
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col-8">
                    <input type="text" name="description" class="form-control" id="inputAddress" placeholder="description"
                        style="width: 100%" title="description" value="{{ old('description', $exam->description) }}">
                </div>
                @error('title')
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="text" name="title" class="form-control" id="inputCity" placeholder="title"
                        style="width: 100%" title="title" value="{{ old('title', $exam->title) }}">
                </div>
            </div>
            <div class="row g-3">
                {{-- message --}}
                @error('date')
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="date" class="form-control" name="date" style="width: 100%" title="date"
                        value="{{ old('date', $exam->date) }}">
                </div>
                @error('start_time')
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="time" class="form-control" name="start_time" style="width: 100%" title="start time"
                        value="{{ old('start_time', $exam->start_time) }}">
                </div>
                @error('end_time')
                <div class="alert alert-danger" style="width:100%">{{ $message }}</div>
                @enderror
                <div class="col">
                    <input type="time" class="form-control" name="end_time" style="width: 100%" title="end time"
                        value="{{ old('end_time', $exam->end_time) }}">
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
                        <option value="mid" {{ old('type', $exam->type) == 'mid' ? 'selected' : '' }}>mid
                        </option>
                        <option value="final" {{ old('type', $exam->type) == 'final' ? 'selected' : '' }}>final
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
                        <option value="20" {{ old('mark', $exam->mark) == 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ old('mark', $exam->mark) == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ old('mark', $exam->mark) == 100 ? 'selected' : '' }}>100</option>

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
