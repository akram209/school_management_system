@extends('layouts.app')
@section('title', 'Class')
@section('title of sidebar', 'Settings')


@section('content')

    <style>
        input {
            width: 200px !important;
            height: 30px !important;
            border-radius: 5px !important;
            border: 1px solid rgb(32, 90, 227)
        }

        input:focus {
            outline: none !important;
            border: 1px solid rgb(183, 204, 247) !important;

        }
    </style>

    @livewire('class-teacher-list', ['classId' => $class->id])




    <table class="table align-middle mb-4 bg-white"
        style=" position: absolute !important; width: 80% !important; height: 30% !important; left: 10% !important; top: 50% !important ">
        <thead>
            <tr>
                <th colspan="2" style="padding-left: 25% !important">
                    <h3>Students</h3>

                </th>
                <th style="padding-left: 20% !important">
                    <form class="d-flex float-end" role="search" id="search-teacher">
                        <input type="search" placeholder="search ">

                    </form>
                </th>
            </tr>
        </thead>
        <thead class="bg-light">
            <tr>
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
        style=" position: absolute !important; width: 80% !important; height: 20% !important; left: 10% !important; top: 90% !important ; overflow:visible !important">
        <thead>
            <tr>
                <th colspan="2" style="padding-right: 10% !important">
                    <h3>Subjects</h3>

                </th>

            </tr>
        </thead>
        <thead class="bg-light">
            <tr>
                <th style="padding-right: 10% !important ">subject</th>
                <th style="padding-right: 100% !important ">teacher</th>
                <th style="padding-right: 15% !important ">description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($class->subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->teachers[0]->user->first_name . ' ' . $subject->teachers[0]->user->last_name }}</td>
                    <td style="width: 50%">{{ $subject->description }}</td>
                </tr>
            @endforeach




        </tbody>
    </table>
@endsection
