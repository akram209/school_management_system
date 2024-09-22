@extends('layouts.app')
@section('title', 'Classe')
@section('title of sidebar', 'Settings')


@section('content')

    <form class="d-flex" role="search" id="search-teacher">
        <input class="form-control me-2" type="search" placeholder="search by teacher name " aria-label="Search">

    </form>
    <h3 id="teacher-list">
        Teacher List
    </h3>
    <table class="table align-middle mb-4 bg-white"
        style=" position: absolute !important; width: 80% !important; height: 30% !important; left: 10% !important; top: 15% !important ">
        <thead class="bg-light">
            <tr style="border-top: 2px solid">
                <th style="padding-right: 100px !important ">Profile</th>
                <th>Email</th>
                <th>Teacher ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>subject</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($class->teachers as $teacher)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $teacher->user->image) }}" alt="Student Image"
                                style="width: 45px; height: 45px" class="rounded-circle" />
                        </div>
                    </td>
                    <td>{{ $teacher->user->email }}</td>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->user->first_name . ' ' . $teacher->user->last_name }}</td>
                    <td>{{ $teacher->user->gender }}</td>
                    <td>{{ $teacher->subject->name }}</td>

                </tr>
            @endforeach

        </tbody>

    </table>
    <form class="d-flex" role="search" id="search-student">
        <input class="form-control me-2" type="search" placeholder="search by student name" aria-label="Search">
    </form>
    <h3 id="student-list">
        Student List
    </h3>



    <table class="table align-middle mb-4 bg-white"
        style=" position: absolute !important; width: 80% !important; height: 30% !important; left: 10% !important; top: 55% !important ">
        <thead class="bg-light">
            <tr style="border-top: 2px solid">
                <th style="padding-right: 100px !important ">Profile</th>
                <th>Email</th>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Class</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($class->students as $student)
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/images/' . $student->user->image) }}" alt="Student Image"
                                style="width: 45px; height: 45px" class="rounded-circle" />
                        </div>
                    </td>
                    <td>{{ $student->user->email }}</td>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->user->first_name . ' ' . $student->user->last_name }}</td>
                    <td>{{ $student->user->gender }}</td>
                    <td>{{ $student->class->name }}</td>

            </tr>
            @endforeach

        </tbody>
    </table>

    <table class="table align-middle mb-4 bg-white"
        style=" position: absolute !important; width: 80% !important; height: 25% !important; left: 10% !important; top: 88% !important ; overflow:visible !important">
        <thead class="bg-light">
            <tr style="border-top: 2px solid ">
                <th style="padding-right: 10% !important ">subject</th>
                <th style="padding-right: 100% !important ">teacher</th>
                <th style="padding-right: 15% !important ">description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($class->teachers as $teacher)
                <tr>
                    <td>{{ $teacher->subject->name }}</td>
                    <td>{{ $teacher->user->first_name . ' ' . $teacher->user->last_name }}</td>
                    <td style="width: 50%">{{ $teacher->subject->description }}</td>
                </tr>
            @endforeach




        </tbody>
    </table>

@endsection
