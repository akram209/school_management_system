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

    @livewire('class-student-list', ['classId' => $class->id])




    <table class="table mb-4 align-middle bg-white"
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
