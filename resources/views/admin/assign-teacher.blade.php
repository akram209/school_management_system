@extends('layouts.app')

@section('title', 'Assign Teachers')
@section('title of sidebar', 'Dashboard')

<style>
    body {
        overflow: hidden;
    }

    .container {
        position: absolute;
        top: 8%;
        left: 25%;
        width: 50% !important;
        border: 1px solid rgb(187, 183, 183);
        border-radius: 10px;
        padding: 10px;
    }

    .form-select,
    .btn {
        height: 50px;
    }

    .alert {
        margin-bottom: 10px;
    }

    .table-container {
        margin-top: 50px;
    }

    .table {
        position: absolute;
        top: 49% !important;
        height: 50vh !important;
        width: 50% !important;
        left: 25% !important;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    th,
    td {
        text-align: center;
        vertical-align: middle;
    }

    .btn-delete {
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .fa-trash-can {
        color: red;
    }
</style>

@section('content')
    <div class="container">
        <h3 style="text-align: center">Assign Teacher to Class and Subject</h3>

        {{-- Success message --}}
        @if (session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" style="text-align: center">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form --}}
        <form class="row g-3" method="POST" action="{{ route('class-subject-teacher.store') }}">
            @csrf

            {{-- Class selection --}}
            <div class="col">
                @error('class_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <select class="form-select" name="class_id" style="margin-left:-5px">
                    <option selected disabled hidden>Class</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Subject selection --}}
            <div class="col">
                @error('subject_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <select class="form-select" name="subject_id" style="margin-left:-5px">
                    <option selected disabled hidden>Subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Teacher selection --}}
            <div class="col">
                @error('teacher_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <select class="form-select" name="teacher_id" style="margin-left:-5px">
                    <option selected disabled hidden>Teacher</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->user->first_name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Submit button --}}
            <div class="col-12">
                <button type="submit" class="btn btn-primary" style="width: 100%">Save</button>
            </div>
        </form>
    </div>

    {{-- Table of assigned classes, subjects, and teachers --}}
    <table class="table mb-5 align-middle bg-white ">
        <table class="table bg-white">
            <thead class="bg-light">
                <tr>
                    <th>Teacher</th>
                    <th>Subject</th>
                    <th>Class</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classSubjectTeachers as $classSubjectTeacher)
                    <tr>
                        <td>{{ $classSubjectTeacher->teacher_name }}</td>
                        <td>{{ $classSubjectTeacher->subject_name }}</td>
                        <td>{{ $classSubjectTeacher->class_name }}</td>
                        <td>
                            <form
                                action="{{ route('class-subject-teacher.destroy', [
                                    'teacher' => $classSubjectTeacher->teacher_id,
                                    'class' => $classSubjectTeacher->class_id,
                                    'subject' => $classSubjectTeacher->subject_id,
                                ]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endsection
