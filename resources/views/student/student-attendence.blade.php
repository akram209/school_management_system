@extends('layouts.app')
@section('title', 'Students')
@section('title of sidebar', 'Settings')
<style>
    .student-number,
    .new-student-number {
        left: 10% !important;

    }

    input[type="search"] {
        margin-top: -5px;
    }
</style>

@section('content')
    <form class="d-flex" role="search" id="search-teacher">
        <input class="form-control me-2" type="search" placeholder="Search by day" aria-label="Search"
            style="width: 40% !important; position: absolute; left: 75% !important">

    </form>
    <form class="d-flex" role="search" id="search-teacher">
        <input class="form-control me-2" type="search" placeholder="Search by date" aria-label="Search"
            style="width: 40% !important; position: absolute; left: 30% !important">

    </form>
    <table class="table align-middle mb-4 bg-white" style="left: 30% !important ;top: 15% !important">
        <thead class="bg-light">
            <tr>
                <th colspan="4" style="text-align: center;">
                    <h1>Attendance</h1>
                </th>
            </tr>
            <tr>
                <th>Full Name</th>
                <th style=" padding-right: 20px !important ">Day</th>
                <th style=" padding-right: 30px !important ">Date</th>
                <th style=" padding-right: 50px !important ">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendences as $attendence)
                <tr>
                    <td>{{ $attendence->student->user->first_name . ' ' . $attendence->student->user->last_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($attendence->date)->format('D') }}</td>
                    <td>{{ $attendence->date }}</td>
                    <td>{{ $attendence->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="student-number">
        <div class="teacher-subject-header">
            <h4>Present </h4>

        </div>
        <div>
            <p style="margin-top: 20% !important ">{{ $presents }}</p>

        </div>

        <div class="teacher-subject-body">

        </div>

    </div>
    <div class="new-student-number">
        <div class="teacher-subject-header">
            <h4> Absent </h4>

        </div>
        <div>
            <p style="margin-top: 20% !important ">{{ $absents }}</p>

        </div>

        <div class="teacher-subject-body">

        </div>

    </div>


@endsection
