@extends('layouts.app')
@section('title', 'Students')
@section('title of sidebar', 'Settings')
<style>
    .student-number,
    .new-student-number {
        left: 10% !important;

    }
</style>

@section('content')
    <form class="d-flex" role="search" id="search-teacher">
        <input class="form-control me-2" type="search" placeholder="Search by day" aria-label="Search"
            style="width: 40% !important; position: absolute; left: 75% !important">

    </form>
    <table class="table align-middle mb-4 bg-white" style="left: 30% !important ;top: 15% !important">
        <thead class="bg-light">
            <!-- Table heading centered -->
            <tr>
                <th colspan="4" style="text-align: center;">
                    <h1>Attendance</h1>
                </th>
            </tr>
            <!-- Table column headers -->
            <tr>
                <th>Full Name</th>
                <th>Day</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example rows, to be replaced with dynamic content -->
            <tr>
                <td>John Doe</td>
                <td>Monday</td>
                <td>2024-09-18</td>
                <td>Present</td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>Monday</td>
                <td>2024-09-18</td>
                <td>Absent</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
    <div class="student-number">
        <div class="teacher-subject-header">
            <h4>Present </h4>

        </div>
        <div>
            <p style="margin-top: 20% !important ">300</p>

        </div>

        <div class="teacher-subject-body">

        </div>

    </div>
    <div class="new-student-number">
        <div class="teacher-subject-header">
            <h4> Absent </h4>

        </div>
        <div>
            <p style="margin-top: 20% !important ">10</p>

        </div>

        <div class="teacher-subject-body">

        </div>

    </div>


@endsection
