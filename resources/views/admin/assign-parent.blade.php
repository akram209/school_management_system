@extends('layouts.app')

@section('title', 'Assign Parent to Child')
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
        top: 40% !important;
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
        <h3 style="text-align: center">Assign Parent to Child</h3>

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
        <form class="row g-3" method="POST" action="{{ route('parent-student.store') }}">
            @csrf

            {{-- Class selection --}}
            <div class="col">
                @error('parent_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <select class="form-select" name="parent_id" style="margin-left:-5px">
                    <option selected disabled hidden>Parent</option>
                    @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}">{{ $parent->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Subject selection --}}
            <div class="col">
                @error('student_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <select class="form-select" name="student_id" style="margin-left:-5px">
                    <option selected disabled hidden>Student</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->id }}
                        </option>
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
                    <th>Student</th>
                    <th>Student Id</th>
                    <th>Parent</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parentStudents as $parentStudent)
                    <tr>
                        <td>{{ $parentStudent->student_first_name }} {{ $parentStudent->student_last_name }}</td>
                        <td>{{ $parentStudent->student_id }}</td>
                        <td>
                            <a href="{{ route('parent.profile', $parentStudent->parent_user_id) }}" target="_blank"
                                style="text-decoration: none; color: black">
                                {{ $parentStudent->parent_first_name }} {{ $parentStudent->parent_last_name }}
                            </a>
                        </td>
                        <td>
                            <form
                                action="{{ route('parent-student.destroy', [
                                    'student' => $parentStudent->student_id,
                                    'parent' => $parentStudent->parent_id,
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
